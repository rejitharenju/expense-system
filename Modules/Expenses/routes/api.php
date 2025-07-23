<?php

use Illuminate\Support\Facades\Route;
use Modules\Expenses\Http\Controllers\ExpensesController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('expenses', ExpensesController::class)->names('expenses');
});

Route::prefix('expenses')->group(function () {
    Route::get('/', [ExpensesController::class, 'index']);
    Route::post('/', [ExpensesController::class, 'store']);
    Route::get('{id}', [ExpensesController::class, 'show']);
    Route::put('{id}', [ExpensesController::class, 'update']);
    Route::delete('{id}', [ExpensesController::class, 'destroy']);
});
