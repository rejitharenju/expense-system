<?php

namespace Modules\Expenses\Services;

use Modules\Expenses\Entities\Expense;

class ExpenseService
{
    public function create(array $data): Expense
    {
        return Expense::create($data);
    }

    public function update(Expense $expense, array $data): Expense
    {
        $expense->update($data);
        return $expense;
    }

    public function delete(Expense $expense): bool
    {
        return $expense->delete();
    }
}
