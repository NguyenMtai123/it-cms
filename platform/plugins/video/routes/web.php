<?php

use Illuminate\Support\Facades\Route;
use Platform\Plugins\Video\Http\Controllers\VideoController;

Route::prefix('admin/videos')
    ->middleware(['web'])
    ->group(function () {

        Route::get(
            '/',
            [VideoController::class, 'index']
        )->name('videos.index');

        Route::post(
            '/',
            [VideoController::class, 'store']
        )->name('videos.store');

        Route::put(
            '/{video}',
            [VideoController::class, 'update']
        )->name('videos.update');

        Route::delete(
            '/{video}',
            [VideoController::class, 'destroy']
        )->name('videos.destroy');

    });
