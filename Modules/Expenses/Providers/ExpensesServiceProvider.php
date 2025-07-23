<?php

namespace Modules\Expenses\Providers;

use Illuminate\Support\ServiceProvider;

class ExpensesServiceProvider extends ServiceProvider
{
    
    protected string $moduleName = 'Expenses';
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
