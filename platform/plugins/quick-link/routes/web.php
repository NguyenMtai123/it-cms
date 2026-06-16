<?php

use Illuminate\Support\Facades\Route;
use Platform\Plugins\QuickLink\Http\Controllers\QuickLinkController;

Route::prefix('admin')
    ->middleware(['web', 'admin'])
    ->group(function () {

        Route::get(
            '/quick-links',
            [QuickLinkController::class, 'index']
        )->name('quick-links.index');

        Route::post(
            '/quick-links',
            [QuickLinkController::class, 'store']
        )->name('quick-links.store');
        Route::put(
            '/quick-links/{id}',
            [QuickLinkController::class, 'update']
        )->name('quick-links.update');

        Route::delete(
            '/quick-links/{id}',
            [QuickLinkController::class, 'destroy']
        )->name('quick-links.destroy');

        Route::get(
            '/quick-links/{id}',
            [QuickLinkController::class, 'show']
        )->name('quick-links.show');
    });
