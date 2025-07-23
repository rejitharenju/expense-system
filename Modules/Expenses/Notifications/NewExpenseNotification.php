<?php

namespace Modules\Expenses\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Modules\Expenses\Entities\Expense;

class NewExpenseNotification extends Notification
{
    use Queueable;

    public function __construct(protected Expense $expense) {}

    public function via($notifiable) { return ['database']; }

    public function toArray($notifiable)
    {
        return [
            'expense_id' => $this->expense->id,
            'message' => "New expense created: {$this->expense->title}",
        ];
    }
}