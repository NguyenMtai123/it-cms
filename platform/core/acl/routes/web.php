<?php

use Illuminate\Support\Facades\Route;
use Platform\Core\ACL\Http\Controllers\AuthController;
use Platform\Core\ACL\Http\Controllers\MemberController;
use Platform\Core\ACL\Http\Controllers\ProfileController;
use Platform\Core\ACL\Http\Controllers\RoleController;
use Platform\Core\ACL\Http\Controllers\UserController;

Route::prefix('admin')
    ->middleware('web')
    ->group(function () {

        Route::get(
            '/login',
            [AuthController::class, 'showLogin']
        )->name('login');

        Route::post(
            '/login',
            [AuthController::class, 'login']
        );

        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::middleware('admin')
            ->group(function () {
                Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
                Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

                Route::prefix('users')
                    ->name('users.')
                    ->group(function () {

                        Route::get(
                            '/',
                            [UserController::class, 'index']
                        )
                            ->middleware('permission:users.view')
                            ->name('index');

                        Route::get(
                            '/create',
                            [UserController::class, 'create']
                        )
                            ->middleware('permission:users.create')
                            ->name('create');

                        Route::post(
                            '/',
                            [UserController::class, 'store']
                        )
                            ->middleware('permission:users.create')
                            ->name('store');

                        Route::get('/{id}/edit', [UserController::class, 'edit'])
                            ->name('edit');

                        Route::put('/{id}', [UserController::class, 'update'])
                            ->name('update');

                        Route::delete('/{id}', [UserController::class, 'destroy'])
                            ->name('destroy');

                    });


                Route::prefix('roles')
                    ->name('roles.')
                    ->group(function () {

                        Route::get(
                            '/',
                            [RoleController::class, 'index']
                        )
                            ->middleware('permission:roles.view')
                            ->name('index');

                        Route::get(
                            '/create',
                            [RoleController::class, 'create']
                        )
                            ->middleware('permission:roles.create')
                            ->name('create');

                        Route::post(
                            '/',
                            [RoleController::class, 'store']
                        )
                            ->middleware('permission:roles.create')
                            ->name('store');

                        Route::get('/{id}/edit', [RoleController::class, 'edit'])
                            ->name('edit');

                        Route::put('/{id}', [RoleController::class, 'update'])
                            ->name('update');

                        Route::delete('/{id}', [RoleController::class, 'destroy'])
                            ->name('destroy');

                    });

            });

        Route::prefix('members')
            ->name('members.')
            ->middleware('admin')
            ->group(function () {

                Route::get('/', [MemberController::class, 'index'])
                    ->name('index');

                Route::get('/create', [MemberController::class, 'create'])
                    ->name('create');

                Route::post('/', [MemberController::class, 'store'])
                    ->name('store');

                Route::get('/{id}/edit', [MemberController::class, 'edit'])
                    ->name('edit');

                Route::put('/{id}', [MemberController::class, 'update'])
                    ->name('update');

                Route::delete('/{id}', [MemberController::class, 'destroy'])
                    ->name('destroy');
            });

    });
