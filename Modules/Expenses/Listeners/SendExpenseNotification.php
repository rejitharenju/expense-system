<?php

namespace Modules\Expenses\Listeners;

use Modules\Expenses\Events\ExpenseCreated;
use Modules\Expenses\Notifications\NewExpenseNotification;

class SendExpenseNotification
{
    public function handle(ExpenseCreated $event)
    {
        $event->expense->notify(new NewExpenseNotification($event->expense));
    }
}