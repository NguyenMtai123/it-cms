<?php

use Illuminate\Support\Facades\Route;
use Platform\Core\Base\Http\Controllers\MenuController;
use Platform\Core\Base\Http\Controllers\PluginController;
use Platform\Core\Base\Http\Controllers\SearchController;
use Platform\Core\Base\Http\Controllers\SettingsController;
use Platform\Core\Base\Http\Controllers\ThemeController;



Route::prefix('admin/plugins')->middleware(['web', 'admin'])->group(function () {
    Route::get('/', [PluginController::class, 'index'])->middleware('permission:core.system');

    Route::post('{id}/install', [PluginController::class, 'install'])->middleware('permission:core.system');
    Route::post('{id}/activate', [PluginController::class, 'activate'])->middleware('permission:core.system');
    Route::post('{id}/deactivate', [PluginController::class, 'deactivate'])->middleware('permission:core.system');
    Route::delete('{id}/uninstall', [PluginController::class, 'uninstall'])->middleware('permission:core.system');
});
Route::prefix('admin')->middleware(['web', 'admin'])
    ->group(function () {

        Route::get(
            '/settings',
            [SettingsController::class, 'index']
        )->name('settings.index')->middleware('permission:core.system');

        Route::post(
            '/settings',
            [SettingsController::class, 'save']
        )->name('settings.save')->middleware('permission:core.system');

    });
Route::prefix('admin/menus')->middleware(['web', 'admin'])->group(function () {
    Route::get('/', [MenuController::class, 'index'])->name('menus.index')->middleware('permission:core.system');
    Route::get('/{id}/edit', [MenuController::class, 'edit'])->name('menus.edit')->middleware('permission:core.system');

    Route::get('/menus/create', [MenuController::class, 'create'])
        ->name('menus.create');

    Route::post('/menus', [MenuController::class, 'store'])
        ->name('menus.store');

    Route::post('/{id}/items', [MenuController::class, 'storeItem'])->name('menus.items.store')->middleware('permission:core.system');
    Route::get(
        '/menus/items/{id}/edit',
        [MenuController::class, 'editItem']
    )->name('menus.items.edit');

    Route::put(
        '/menus/items/{id}',
        [MenuController::class, 'updateItem']
    )->name('menus.items.update');

    Route::delete(
        '/menus/items/{id}',
        [MenuController::class, 'destroyItem']
    )->name('menus.items.destroy');
    Route::post('/order', [MenuController::class, 'updateOrder'])->name('menus.order')->middleware('permission:core.system');
});
Route::prefix('admin/themes')->middleware(['web', 'admin'])->group(function () {
    Route::get('/', [ThemeController::class, 'index']);
    Route::post('{slug}/activate', [ThemeController::class, 'activate']);
});



// Route::get('/', [HomeController::class, 'index']);
Route::get('/search', [SearchController::class, 'index'])
    ->name('search');
