<?php

use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Route;


Route::apiResource('expenses', ExpenseController::class);
