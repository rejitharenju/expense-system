# Expenses Module

## Tech Stack

- Laravel 12.x
- Form Requests for validation
- Eloquent ORM
- Service Layer
- API Routes (defined in `routes/api.php`)
- HTTP status codes handled using Response Facade
- Resource and ResourceCollection used for formatting responses
- Scribe for API documentation
- PHPUnit for feature testing
- Event: `ExpenseCreated`
- Notification: Database notification on expense creation

##  Setup
1. `composer install`
2. Configure `.env` (DB settings).
3. `php artisan migrate`
4. `php artisan module:make Expenses` 
5. `php artisan module:migrate Expenses`

## Module Structure

Modules/Expenses/
├── config/
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── Entities/
├── Events/
├── Http/
│   ├── Controllers/
│   ├── Requests/
│   └── Resources/
├── Listeners/
├── Notifications/
├── Providers/
├── resources/
│   ├── assets/
│   └── views/
├── routes/
├── Services/
└── tests/
    ├── Feature/
    └── Unit/

## Decisions
- Used modular architecture for domain isolation.
- Form Request validation inline.
- Service layer (`ExpenseService`) for business logic.
- Resource & Event/Notification for clean API and plugin extendability.
- Scribe for API docs — annotate in controller.
- Feature test to assert core flow.

## Expense Fields

Each expense has the following fields:
- `id` (UUID)
- `title` (string)
- `amount` (decimal)
- `category` (enum)
- `expense_date` (date)
- `notes` (nullable text)
- `created_at`, `updated_at` (timestamps)

## Features

- Create an expense
- View all expenses
- Update an expense
- Delete an expense
- Optional: Filter by category and date range

## Time Spent
~4 hours

## Assumptions
- No authentication (per spec).
- Notifications via database only.