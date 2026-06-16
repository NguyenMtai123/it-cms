<?php

use Illuminate\Support\Facades\Route;
use Platform\Plugins\Event\Http\Controllers\EventController;
use Platform\Plugins\Event\Http\Controllers\PublicEventController;

Route::prefix('admin/events')->middleware(['web', 'admin'])->group(function () {

    Route::get('/', [EventController::class, 'index'])->name('events.index')->middleware('permission:event.view');
    Route::get('/create', [EventController::class, 'create'])->name('events.create')->middleware('permission:event.create');
    Route::post('/', [EventController::class, 'store'])->name('events.store')->middleware('permission:event.create');

    Route::get('/{id}/edit', [EventController::class, 'edit'])->name('events.edit')->middleware('permission:event.edit');
    Route::put('/{id}', [EventController::class, 'update'])->name('events.update')->middleware('permission:event.edit');

    Route::delete('/{id}', [EventController::class, 'destroy'])->name('events.destroy')->middleware('permission:event.delete');
});

Route::middleware('web')->group(function () {

 Route::get('/events', [PublicEventController::class, 'index'])->name('public.events.index');
    Route::get('/events/{slug}', [PublicEventController::class, 'show'])->name('public.events.show');
});
