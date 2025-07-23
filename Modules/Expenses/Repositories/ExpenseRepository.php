<?php

namespace Modules\Expenses\Repositories;

use Modules\Expenses\Entities\Expense;

class ExpenseRepository implements ExpenseRepositoryInterface
{
    public function all(array $filters = [])
    {
        $query = Expense::query();

        if (!empty($filters['category'])) {
            $query->where('category', $filters['category']);
        }

        if (!empty($filters['date_from'])) {
            $query->whereDate('expense_date', '>=', $filters['date_from']);
        }

        if (!empty($filters['date_to'])) {
            $query->whereDate('expense_date', '<=', $filters['date_to']);
        }

        return $query->latest()->get();
    }

    public function find($id)
    {
        return Expense::findOrFail($id);
    }

    public function create(array $data)
    {
        return Expense::create($data);
    }

    public function update($id, array $data)
    {
        $expense = $this->find($id);
        $expense->update($data);
        return $expense;
    }

    public function delete($id)
    {
        $expense = $this->find($id);
        return $expense->delete();
    }
}
