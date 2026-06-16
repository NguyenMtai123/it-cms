<?php
use Illuminate\Support\Facades\Route;
use Platform\Plugins\Admission\Http\Controllers\AdmissionController;
use Platform\Plugins\Admission\Http\Controllers\AdmissionSettingController;

Route::prefix('admin')
    ->middleware(['web', 'admin'])
    ->group(function () {

        Route::get(
            '/admissions',
            [AdmissionController::class, 'index']
        )->name('admissions.index');
        Route::get(
            '/admissions/{id}',
            [AdmissionController::class, 'show']
        )->name('admissions.show');

        Route::post(
            '/admissions',
            [AdmissionController::class, 'store']
        )->name('admissions.store');

        Route::put(
            '/admissions/{id}',
            [AdmissionController::class, 'update']
        )->name('admissions.update');

        Route::delete(
            '/admissions/{id}',
            [AdmissionController::class, 'destroy']
        )->name('admissions.destroy');

        Route::get(
            '/admission-settings',
            [AdmissionSettingController::class, 'index']
        )->name('admission-settings.index');

        Route::post(
            '/admission-settings',
            [AdmissionSettingController::class, 'update']
        )->name('admission-settings.update');
    });
