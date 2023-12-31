<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExpenseResource;
use App\Mail\ExpenseMail;
use App\Models\Expense;
use App\Notifications\ExpenseNotification;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ExpenseController extends Controller
{
    protected $user = [];
    public function __construct()
    {
        $this->authorizeResource(Expense::class,'expense');
        $this->user = Auth::user();
    }

    public function index()
    {
        $expenses = $this->user->expenses;
        return ExpenseResource::collection($expenses);
    }

    public function show(Expense $expense)
    {
        try {
            return (new ExpenseResource($expense))->response()->setStatusCode(200);
        } catch (\Exception $e) {
            return response(['msg' => 'A failure occurred: '.$e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $this->validateRequest($request);
            $request->validate([
                'description' => 'required|max:191',
                'value' => 'numeric|required|min:1',
                'date_expense' => [
                    'required',
                    function ($attribute, $value, $fail) {
                        if ($value > now()) {
                            $fail($attribute . ' must be a past date.');
                        }
                    },
                ]
            ]);

            $expense = Expense::create($request->all());
            $expenseResource = new ExpenseResource($expense);
            $this->sendMail($expense);
            return $expenseResource->response()->setStatusCode(201);
        } catch (\Exception $e) {
            return response(['msg' => 'Could not create record. try again. ' . $e->getMessage()],  $e->getCode() != 0 ? $e->getCode() : 400);
        }
    }

    public function update(Request $request, Expense $expense): Response
    {
        try{
            $this->validateRequest($request);
            $request->validate([
                'description' => 'required|max:191',
                'value' => 'numeric|min:1',
                'date_expense' => [
                    function ($attribute, $value, $fail) {
                        if ($value > now()) {
                            $fail($attribute . ' must be a past date.');
                        }
                    },
                ]
            ]);

            $expense->update($request->only([
                'description', 'value','date_expense'
            ]));

            return response(['msg' => 'Expense updated successfully'], 200);
        } catch (\Exception $e){
            return response(['msg' => 'Could not update record. try again. ' . $e->getMessage()],  $e->getCode() != 0 ? $e->getCode() : 400);
        }

    }


    public function destroy(Expense $expense): Response
    {
        try{
            $expense->delete();
            return response(['msg' => 'Expense deleted successfully'], 200);
        }catch(\Exception $e){
            return response(['msg' => 'Could not delete record. try again. ' . $e->getMessage()],  $e->getCode());
        }
    }

    /**
     * validateResponse
     *
     * @param  mixed $request
     * @return void
     */
    private function validateRequest(Request $request): void
    {
        if (!$request->all()) {
            throw new \Exception('No data has been sent.',400);
        }

        if(!$this->user->id){
            throw new \Exception('Unauthenticated user. Log in to continue.',401);
        }
    }

    /**
     * @param ExpenseResource $expenseResource
     * @return void
     */
    private function sendMail(Expense $expense): void
    {
        //Mail::to($this->user->email)->send(new ExpenseMail($expenseResource));
        $expense->user->notify(new ExpenseNotification($expense));
    }
}
