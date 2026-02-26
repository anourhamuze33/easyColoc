<?php

use App\Http\Middleware\AuthMiddlware;
use App\Http\Middleware\colocationActiveMiddlware;
use App\Http\Middleware\newColocationMiddlware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
        'Authentification' => AuthMiddlware::class,
        'notActiveColocation'=> colocationActiveMiddlware::class,
        'activeColocation'=> newColocationMiddlware::class
    ]);

    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
