<?php

use Illuminate\Foundation\MaintenanceMode\Drivers\FileDriver;
use Illuminate\Contracts\Foundation\MaintenanceMode;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Database\DatabaseServiceProvider;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })
    ->withBindings([
        MaintenanceMode::class => fn () => new FileDriver(
            new Filesystem,
            dirname(__DIR__) . '/storage/framework'
        ),
        'files' => fn () => new Filesystem(),
    ])
    ->withProviders([
        DatabaseServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,
        Knuckles\Scribe\ScribeServiceProvider::class,
    ])
    ->create();
