<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExpenseResource;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return response(Expense::all());
    }

    public function show(string $id)
    {
        try {
            $expense = Expense::findOrFail($id);
            $response = new ExpenseResource($expense);
        } catch (\Exception $e) {
            return response(['msg' => 'No data found with this id'], 404);
        }
        return $response->response();
    }

    public function store()
    {
    }

    public function update()
    {
    }

    public function destroy()
    {
    }
}
