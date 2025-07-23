<?php

namespace Modules\Expenses\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'amount',
        'category',
        'expense_date',
        'notes',
    ];

    protected static function booted()
    {
        static::creating(function ($expense) {
            $expense->id = Str::uuid();
        });
    }

    protected $casts = [
        'expense_date' => 'date',
        'amount' => 'decimal:2',
    ];
}
