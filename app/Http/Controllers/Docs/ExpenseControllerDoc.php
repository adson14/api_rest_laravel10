<?php

namespace App\Http\Controllers\Docs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;


class ExpenseControllerDoc
{

    /**
     * @OA\Get(
     *     path="/expenses",
     *     operationId="index",
     *     tags={"Expenses"},
     *     summary="Get all expenses",
     *     security={{"bearer_token": {}}},
     *     @OA\Response(
     *     response="200",
     *     description="List of expenses",
     *      @OA\JsonContent(
     *        @OA\Property(
     *          property="data",
     *          type="object",
     *          example={
     *              {"id": 1, "description": "Expense description", "date_expense": "2023-06-29T03:00:00.000000Z", "value": 10.5,"user":{"id":1,"name":"RICK","email":"test@test.com"} },
     *              {"id": 2, "description": "Expense description 2", "date_expense": "2023-06-28T03:00:00.000000Z", "value": 1.5,"user":{"id":1,"name":"Warn","email":"test@test.com"} }
     *          }
     *        )
     *      )
     *     ),
     *      @OA\Response(
     *        response="404",
     *        description="Not Found"
     *     )
     * )
     */
    public function index()
    {

    }

    /**
     * @OA\Get(
     *     path="/expenses/{id}",
     *     operationId="show",
     *     tags={"Expenses"},
     *     summary="Get one expense",
     *     security={{"bearer_token": {}}},
     *      @OA\Parameter(name="id", in="path", description="Id of Expense", required=true,
     *        @OA\Schema(type="integer")
     *      ),
     *     @OA\Response(
     *      response="200",
     *      description="List of expenses",
     *      @OA\JsonContent(
     *        @OA\Property(property="data", type="object", example={"id": 1, "description": "Expense description", "date_expense": "2023-06-29T03:00:00.000000Z", "value": 10.5,"user":{"id":1,"name":"RICK","email":"test@test.com"} })
     *      )
     *     ),
     *     @OA\Response(
     *        response="500",
     *        description="A failure occurred:",
     *        @OA\JsonContent(
     *            @OA\Property(property="msg", type="string",example="A failure occurred:")
     *        )
     *     ),
     *       @OA\Response(
     *        response="404",
     *        description="Not Found"
     *     )
     * )
     */
    public function show()
    {

    }

    /**
     * @OA\Post(
     *     path="/expenses",
     *     operationId="store",
     *     tags={"Expenses"},
     *     summary="Create a new expense",
     *     security={{"bearer_token": {}}},
     *     @OA\Response(
     *      response="201",
     *      description="Expense created successfully",
     *      @OA\JsonContent(
     *        @OA\Property(property="data", type="object", example={"id": 1, "description": "Expense description", "date_expense": "2023-06-29T03:00:00.000000Z", "value": 10.5,"user":{"id":1,"name":"RICK","email":"test@test.com"} })
     *      )
     *     ),
     *     @OA\Response(
     *        response="400",
     *        description="Could not create record",
     *        @OA\JsonContent(
     *            @OA\Property(property="msg", type="string",example="Could not create record. try again.")
     *        )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"description", "value", "date_expense"},
     *             @OA\Property(property="description", type="string", maxLength=191),
     *             @OA\Property(property="value", type="number", minimum=1),
     *             @OA\Property(property="date_expense", type="string", format="date", description="Must be a past date")
     *         )
     *     )
     * )
     */
    public function store()
    {
        // Método vazio apenas para documentação
    }

    /**
     * @OA\Put(
     *     path="/expenses",
     *     operationId="update",
     *     tags={"Expenses"},
     *     summary="Update a expense",
     *     security={{"bearer_token": {}}},
     *     @OA\Response(
     *      response="200",
     *      description="Expense updated successfully",
     *      @OA\JsonContent(
     *        @OA\Property(property="msg", type="string", example="Expense updated successfully")
     *      )
     *     ),
     *     @OA\Response(
     *        response="400",
     *        description="Could not update record",
     *        @OA\JsonContent(
     *            @OA\Property(property="msg", type="string",example="Could not update record. try again.")
     *        )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="description", type="string", maxLength=191),
     *             @OA\Property(property="value", type="number", minimum=1),
     *             @OA\Property(property="date_expense", type="string", format="date", description="Must be a past date")
     *         )
     *     )
     * )
     */
    public function update()
    {
        // Método vazio apenas para documentação
    }

    /**
     * @OA\Delete(
     *     path="/expenses/{id}",
     *     operationId="destroy",
     *     tags={"Expenses"},
     *     summary="Delete a expense",
     *     security={{"bearer_token": {}}},
     *      @OA\Parameter(name="id", in="path", description="Id of Expense", required=true,
     *        @OA\Schema(type="integer")
     *      ),
     *     @OA\Response(
     *      response="200",
     *      description="Success",
     *      @OA\JsonContent(
     *        @OA\Property(property="msg", type="string", example="Expense deleted successfully")
     *      )
     *     ),
     *     @OA\Response(
     *        response="500",
     *        description="Could not delete record. try again.",
     *        @OA\JsonContent(
     *            @OA\Property(property="msg", type="string",example="Could not delete record. try again.")
     *        )
     *     ),
     *       @OA\Response(
     *        response="404",
     *        description="Not Found"
     *     )
     * )
     */
    public function destroy()
    {

    }
}
