<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->middleware(['web', 'admin'])
    ->group(function () {

        Route::get('/', function () {
            return view('dashboard::dashboard.index');
        })->middleware('permission:core.system');

    });
