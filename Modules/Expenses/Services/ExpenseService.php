<?php

namespace Modules\Expenses\Services;

use Modules\Expenses\Repositories\ExpenseRepositoryInterface;

class ExpenseService
{
    protected $expenseRepo;

    public function __construct(ExpenseRepositoryInterface $expenseRepo)
    {
        $this->expenseRepo = $expenseRepo;
    }

    public function list(array $filters = [])
    {
        return $this->expenseRepo->all($filters);
    }

    public function create(array $data)
    {
        return $this->expenseRepo->create($data);
    }

    public function update($expense, array $data)
    {
        return $this->expenseRepo->update($expense->id, $data);
    }

    public function delete($expense)
    {
        return $this->expenseRepo->delete($expense->id);
    }
}
