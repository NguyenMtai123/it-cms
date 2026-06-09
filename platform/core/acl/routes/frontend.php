<?php

use Illuminate\Support\Facades\Route;
use Platform\Core\ACL\Http\Controllers\CustomerAuthController;
use Platform\Core\Base\Http\Controllers\HomeController;
use Platform\Plugins\Event\Http\Controllers\PublicEventController;

Route::middleware('web')->group(function () {

Route::get('/', [HomeController::class, 'index']);


    Route::get('/login', [
        CustomerAuthController::class,
        'loginForm'
    ])->name('customer.login');

    Route::post('/login', [
        CustomerAuthController::class,
        'login'
    ]);

    Route::get('/register', [
        CustomerAuthController::class,
        'registerForm'
    ]);

    Route::post('/register', [
        CustomerAuthController::class,
        'register'
    ]);
    Route::post('/logout', [
        CustomerAuthController::class,
        'logout'
    ])->name('customer.logout');
    Route::get('/events', [PublicEventController::class, 'index'])->name('public.events.index');
    Route::get('/events/{slug}', [PublicEventController::class, 'show'])->name('public.events.show');

});
