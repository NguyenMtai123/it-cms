<?php

use Illuminate\Support\Facades\Route;
use Platform\Plugins\Banner\Http\Controllers\BannerController;

Route::prefix('admin/banner')
    ->middleware(['web', 'admin'])
    ->group(function () {

        Route::get('/', [BannerController::class, 'index'])
            ->name('admin.banner.index')
            ->middleware('permission:banner.view');

        Route::get('/create', [BannerController::class, 'create'])
            ->name('admin.banner.create')
            ->middleware('permission:banner.create');

        Route::post('/', [BannerController::class, 'store'])
            ->name('admin.banner.store')
            ->middleware('permission:banner.create');

        Route::get('/{banner}/edit', [BannerController::class, 'edit'])
            ->name('admin.banner.edit')
            ->middleware('permission:banner.edit');

        Route::put('/{banner}', [BannerController::class, 'update'])
            ->name('admin.banner.update')
            ->middleware('permission:banner.edit');

        Route::delete('/{banner}', [BannerController::class, 'destroy'])
            ->name('admin.banner.destroy')
            ->middleware('permission:banner.delete');
    });
