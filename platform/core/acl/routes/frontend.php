<?php

use Illuminate\Support\Facades\Route;
use Platform\Core\ACL\Http\Controllers\CustomerAuthController;
use Platform\Core\Base\Http\Controllers\HomeController;

Route::middleware('web')->group(function () {

    Route::get('/', [HomeController::class, 'index']);


    Route::get('/dang-nhap', [
        CustomerAuthController::class,
        'loginForm'
    ])->name('customer.login');

    Route::post('/dang-nhap', [
        CustomerAuthController::class,
        'login'
    ]);

    Route::get('/dang-ky', [
        CustomerAuthController::class,
        'registerForm'
    ])->name('customer.register');

    Route::post('/dang-ky', [
        CustomerAuthController::class,
        'register'
    ]);

    Route::get(
        '/quen-mat-khau',
        [CustomerAuthController::class, 'forgotPasswordForm']
    )->name('customer.password.request');

    Route::post(
        '/quen-mat-khau',
        [CustomerAuthController::class, 'sendResetLink']
    )->name('customer.password.email');

    Route::get(
    '/dat-lai-mat-khau/{token}',
    [CustomerAuthController::class, 'resetPasswordForm']
)->name('customer.password.reset');

Route::get(
    '/reset-password/{token}',
    [CustomerAuthController::class, 'resetPasswordForm']
)->name('password.reset');

    Route::post(
        '/dat-lai-mat-khau',
        [CustomerAuthController::class, 'resetPassword']
    )->name('customer.password.update');

    Route::post('/dang-xuat', [
        CustomerAuthController::class,
        'logout'
    ])->name('customer.logout');

});
Route::get('/phpinfo-upload', function () {
    return [
        'upload_max_filesize' => ini_get('upload_max_filesize'),
        'post_max_size' => ini_get('post_max_size'),
        'memory_limit' => ini_get('memory_limit'),
    ];
});
Route::get('/test-mail', function () {

    \Illuminate\Support\Facades\Mail::raw(
        'Test mail IT CMS',
        function ($message) {
            $message->to('nguyenhuvo36@gmail.com')
                    ->subject('Test Email');
        }
    );

    return 'OK';
});
Route::middleware(['web', 'auth'])
    ->prefix('tai-khoan')
    ->name('customer.')
    ->group(function () {

        Route::get(
            '/',
            [CustomerAuthController::class, 'profile']
        )->name('profile');

        Route::post(
            '/cap-nhat',
            [CustomerAuthController::class, 'updateProfile']
        )->name('profile.update');

        Route::post(
            '/doi-mat-khau',
            [CustomerAuthController::class, 'changePassword']
        )->name('password.change');

    });
