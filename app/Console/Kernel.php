<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Register the commands for the application.
     */
    protected $commands = [
        \App\Console\Commands\RunExpensesMigration::class,
    ];

    protected function schedule(Schedule $schedule): void
    {
        // Define scheduled commands here if needed
    }

    protected function commands(): void
    {
        // You can load additional command files if needed
    }
}
