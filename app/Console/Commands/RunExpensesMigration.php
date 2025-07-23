<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RunExpensesMigration extends Command
{
    protected $signature = 'custom:run-expense-migration';
    protected $description = 'Run Expenses table migration manually';

    public function handle(): int
    {
        include base_path('Modules/Expenses/Database/Migrations/2025_07_23_111251_create_expenses_table.php');
        $migration = new \CreateExpensesTable;
        $migration->up();

        $this->info('Expenses table migration executed successfully.');
        return Command::SUCCESS;
    }
}
