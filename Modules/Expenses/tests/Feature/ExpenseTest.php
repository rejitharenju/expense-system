<?php

namespace Modules\Expenses\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Expenses\Entities\Expense;
use Tests\TestCase;

class ExpenseTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_and_lists_expenses()
    {
        $payload = [
            'title' => 'Test',
            'amount' => 9.99,
            'category' => 'Office',
            'expense_date' => '2025-07-23',
            'notes' => 'Test note',
        ];

        $this->postJson('/api/expenses', $payload)
            ->assertStatus(201)
            ->assertJsonFragment(['title' => 'Test']);

        $this->getJson('/api/expenses?category=Office')
            ->assertStatus(200)
            ->assertJsonCount(1, 'data');
    }
}
