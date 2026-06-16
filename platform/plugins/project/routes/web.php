<?php

use Illuminate\Support\Facades\Route;
use Platform\Plugins\Project\Http\Controllers\ProjectController;

Route::prefix('admin')
    ->middleware(['web', 'admin'])
    ->group(function () {

        Route::get(
            '/projects',
            [ProjectController::class, 'index']
        )->name('projects.index');

        Route::post(
            '/projects',
            [ProjectController::class, 'store']
        )->name('projects.store');

        Route::get(
            'projects/{id}/edit',
            [ProjectController::class, 'edit']
        )->name('projects.edit');

        Route::put(
            'projects/{id}',
            [ProjectController::class, 'update']
        )->name('projects.update');

        Route::delete(
            '/projects/{id}',
            [ProjectController::class, 'destroy']
        )->name('projects.destroy');
    });
