<?php

use Illuminate\Support\Facades\Route;
use Platform\Plugins\Announcement\Http\Controllers\AnnouncementController;
use Platform\Plugins\Announcement\Http\Controllers\AnnouncementFrontController;

Route::prefix('admin/announcements')->middleware(['web', 'admin'])
    ->name('announcements.')
    ->group(function () {

        Route::get(
            '/',
            [AnnouncementController::class, 'index']
        )->name('index');

        Route::get(
            '/create',
            [AnnouncementController::class, 'create']
        )->name('create');

        Route::post(
            '/',
            [AnnouncementController::class, 'store']
        )->name('store');

        Route::get(
            '/{id}/edit',
            [AnnouncementController::class, 'edit']
        )->name('edit');

        Route::put(
            '/{id}',
            [AnnouncementController::class, 'update']
        )->name('update');

        Route::delete(
            '/{id}',
            [AnnouncementController::class, 'destroy']
        )->name('destroy');
    });
Route::get(
    '/announcements',
    [AnnouncementFrontController::class, 'index']
)->name('announcements');
Route::get(
    '/announcements/{slug}',
    [AnnouncementFrontController::class, 'show']
)->name('announcements.show');
