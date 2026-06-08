<?php

use Illuminate\Support\Facades\Route;
use Platform\Core\Media\Http\Controllers\MediaController;
use Platform\Core\Media\Http\Controllers\MediaFolderController;
use Platform\Core\Media\Http\Controllers\MediaMoveController;
use Platform\Core\Media\Http\Controllers\MediaPickerController;

Route::prefix('admin/media')
    ->middleware(['web', 'admin'])
    ->group(function () {
        Route::get('/', [MediaController::class, 'index'])
            ->name('media.index');

        Route::post('/upload', [MediaController::class, 'upload'])
            ->name('media.upload');

        Route::post('/folders', [MediaFolderController::class, 'store'])
            ->name('media.folders.store');

        Route::post('/folders/{id}/rename', [MediaFolderController::class, 'rename'])
            ->name('media.folders.rename');

        Route::delete('/folders/{id}', [MediaFolderController::class, 'destroy'])
            ->name('media.folders.destroy');

        Route::post('/files/{id}/rename', [MediaController::class, 'renameFile'])
            ->name('media.files.rename');

        Route::post('/files/{id}/move', [MediaController::class, 'moveFile'])
            ->name('media.files.move');

        Route::post('/files/{id}/alt', [MediaController::class, 'updateAlt'])
            ->name('media.files.alt');

        Route::delete('/files/{id}', [MediaController::class, 'destroyFile'])
            ->name('media.files.destroy');

        Route::get('/picker', [MediaPickerController::class, 'index'])
            ->name('media.picker');

        Route::post('media/move-file', [MediaMoveController::class, 'moveFile'])->name('media.move.file');
        Route::post('media/move-folder', [MediaMoveController::class, 'moveFolder'])->name('media.move.folder');
    });
