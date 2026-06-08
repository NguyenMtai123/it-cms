<?php

use Illuminate\Support\Facades\Route;
use Platform\Plugins\Event\Http\Controllers\EventController;

Route::prefix('admin/events')->group(function () {

    Route::get('/', [EventController::class, 'index'])->name('events.index');
    Route::get('/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/', [EventController::class, 'store'])->name('events.store');

    Route::get('/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/{id}', [EventController::class, 'update'])->name('events.update');

    Route::delete('/{id}', [EventController::class, 'destroy'])->name('events.destroy');
});
