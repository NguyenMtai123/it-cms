<?php

use Illuminate\Support\Facades\Route;
use Platform\Plugins\Footer\Http\Controllers\FooterSettingController;
use Platform\Plugins\Footer\Http\Controllers\FooterLinkController;

Route::prefix('admin')->middleware(['web', 'admin'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Footer Setting
    |--------------------------------------------------------------------------
    */

    Route::get(
        'footer-setting',
        [FooterSettingController::class, 'index']
    )->name('footer-setting.index');

    Route::post(
        'footer-setting',
        [FooterSettingController::class, 'save']
    )->name('footer-setting.save');

    /*
    |--------------------------------------------------------------------------
    | Footer Links
    |--------------------------------------------------------------------------
    */

    Route::get(
        'footer-links',
        [FooterLinkController::class, 'index']
    )->name('footer-link.index');

    Route::post(
        'footer-links',
        [FooterLinkController::class, 'store']
    )->name('footer-link.store');

    Route::put(
        'footer-links/{id}',
        [FooterLinkController::class, 'update']
    )->name('footer-link.update');

    Route::delete(
        'footer-links/{id}',
        [FooterLinkController::class, 'destroy']
    )->name('footer-link.destroy');

});
