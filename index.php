<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/vendor/autoload.php';

Application::configure(__DIR__ . DIRECTORY_SEPARATOR . 'laravel')
    ->withRouting(function () {
        Route::get('/', fn(): array => [
            'hello' => 'world',
        ]);
    })
    ->booted(fn() => Facades\Config::set('app.debug', true))
    ->booted(fn() => Facades\Config::set('database', [
        'default'     => 'main',
        'connections' => [
            'main' => [
                'driver'   => 'sqlite',
                'database' => 'database.sqlite',
            ],
        ],
        'migrations'  => 'migrations',
    ]))
    ->withExceptions()
    ->create()
    ->handleRequest(Request::capture());
?>
