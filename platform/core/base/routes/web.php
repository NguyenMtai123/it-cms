<?php

use Illuminate\Support\Facades\Route;
use Platform\Core\Base\Http\Controllers\AnnouncementController;
use Platform\Core\Base\Http\Controllers\PluginController;
use Platform\Core\Base\Http\Controllers\SettingsController;
use Platform\Core\Base\Http\Controllers\MenuController;
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

    Route::post('/{id}/items', [MenuController::class, 'storeItem'])->name('menus.items.store')->middleware('permission:core.system');

    Route::post('/order', [MenuController::class, 'updateOrder'])->name('menus.order')->middleware('permission:core.system');
});
Route::prefix('admin/announcements')->middleware(['web', 'admin'])->group(function () {
    Route::get('/', [AnnouncementController::class, 'index'])->name('announcements.index')->middleware('permission:core.system');
    Route::get('/create', [AnnouncementController::class, 'create'])->name('announcements.create')->middleware('permission:core.system');
    Route::post('/', [AnnouncementController::class, 'store'])->name('announcements.store')->middleware('permission:core.system');
    Route::get('/{id}/edit', [AnnouncementController::class, 'edit'])->name('announcements.edit')->middleware('permission:core.system');
    Route::put('/{id}', [AnnouncementController::class, 'update'])->name('announcements.update')->middleware('permission:core.system');
    Route::delete('/{id}', [AnnouncementController::class, 'destroy'])->name('announcements.destroy')->middleware('permission:core.system');
});
Route::prefix('admin/themes')->middleware(['web', 'admin'])->group(function () {
    Route::get('/', [ThemeController::class, 'index']);
    Route::post('{slug}/activate', [ThemeController::class, 'activate']);
});



// Route::get('/', [HomeController::class, 'index']);
