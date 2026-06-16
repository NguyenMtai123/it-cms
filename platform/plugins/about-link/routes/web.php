<?php

use Illuminate\Support\Facades\Route;
use Platform\Plugins\AboutLink\Http\Controllers\AboutLinkController;

Route::prefix('admin/about-links')
    ->middleware(['web', 'admin'])
    ->group(function () {

        Route::get(
            '/',
            [AboutLinkController::class, 'index']
        )->name('about-link.index');

        Route::post(
            '/',
            [AboutLinkController::class, 'store']
        )->name('about-link.store');

        Route::get(
            '/{id}/edit',
            [AboutLinkController::class, 'edit']
        )->name('about-link.edit');

        Route::put(
            '/{id}',
            [AboutLinkController::class, 'update']
        )->name('about-link.update');

        Route::delete(
            '/{id}',
            [AboutLinkController::class, 'destroy']
        )->name('about-link.destroy');

    });
