<?php

use Illuminate\Support\Facades\Route;
use Platform\Plugins\Page\Http\Controllers\PageController;

Route::prefix('admin/pages')
    ->middleware(['web', 'admin'])
    ->group(function () {

        Route::get('/', [PageController::class, 'index'])
            ->name('pages.index')
            ->middleware('permission:pages.view');

        Route::get('/create', [PageController::class, 'create'])
            ->name('pages.create')
            ->middleware('permission:pages.create');

        Route::post('/', [PageController::class, 'store'])
            ->name('pages.store')
            ->middleware('permission:pages.create');

        Route::get('/{id}/edit', [PageController::class, 'edit'])
            ->name('pages.edit')
            ->middleware('permission:pages.edit');

        Route::put('/{id}', [PageController::class, 'update'])
            ->name('pages.update')
            ->middleware('permission:pages.edit');

        Route::delete('/{id}', [PageController::class, 'destroy'])
            ->name('pages.destroy')
            ->middleware('permission:pages.delete');
    });
