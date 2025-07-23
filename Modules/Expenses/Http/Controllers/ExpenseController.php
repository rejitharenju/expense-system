<?php

namespace Modules\Expenses\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Expenses\Services\ExpenseService;
use Modules\Expenses\Http\Resources\ExpenseResource;
use Modules\Expenses\Entities\Expense;

class ExpenseController extends Controller
{
    protected $expenseService;

    public function __construct(ExpenseService $expenseService)
    {
        $this->expenseService = $expenseService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $req, ExpenseService $svc)
    {
        $filters = $req->only(['category', 'date_from', 'date_to']);
        $expenses = $svc->list($filters);
        return response()->json(ExpenseResource::collection($expenses), Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expenses::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req, ExpenseService $svc)
    {
        $data = $req->validate([
            'title' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'category' => 'required|string',
            'expense_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);
        $expense = $svc->create($data);
        event(new \Modules\Expenses\Events\ExpenseCreated($expense));
        return response()->json(new ExpenseResource($expense), Response::HTTP_CREATED);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('expenses::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('expenses::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $expense = Expense::findOrFail($id);
        $updatedExpense = $this->expenseService->update($expense, $request->all());
        return response()->json(new ExpenseResource($updatedExpense), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $this->expenseService->delete($expense);
        return response()->json(['message' => 'Expense deleted successfully'], Response::HTTP_NO_CONTENT);
    }
}
