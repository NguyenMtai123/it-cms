<?php

use Illuminate\Support\Facades\Route;
use Platform\Plugins\Blog\Http\Controllers\CategoryController;
use Platform\Plugins\Blog\Http\Controllers\PostController;
use Platform\Plugins\Blog\Http\Controllers\PublicPostController;
use Platform\Plugins\Blog\Http\Controllers\TagController;

Route::prefix('admin/blog')
    ->middleware(['web', 'admin'])
    ->group(function () {
        Route::get('/posts', [PostController::class, 'index'])->name('blog.posts.index')->middleware('permission:blog.posts.view');
        Route::get('/posts/create', [PostController::class, 'create'])->name('blog.posts.create')->middleware('permission:blog.posts.create');
        Route::post('/posts', [PostController::class, 'store'])->name('blog.posts.store')->middleware('permission:blog.posts.create');
        Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('blog.posts.edit')->middleware('permission:blog.posts.edit');
        Route::put('/posts/{id}', [PostController::class, 'update'])->name('blog.posts.update')->middleware('permission:blog.posts.edit');
        Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('blog.posts.destroy')->middleware('permission:blog.posts.delete');

        // categories
        Route::get('/categories', [CategoryController::class, 'index']);
        Route::get('/categories/create', [CategoryController::class, 'create']);
        Route::post('/categories', [CategoryController::class, 'store']);
        Route::get('/categories/{id}/edit', [CategoryController::class, 'edit']);
        Route::put('/categories/{id}', [CategoryController::class, 'update']);
        Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

        Route::get('/tags', [TagController::class, 'index']);
        Route::post('/tags', [TagController::class, 'store']);
        Route::delete('/tags/{id}', [TagController::class, 'destroy']);
    });
Route::middleware('web')->group(function () {

    Route::get('/blog', [PublicPostController::class, 'index'])
        ->name('blog.index');

    Route::get('/blog/category/{slug}', [
        PublicPostController::class,
        'category'
    ])->name('blog.category');

    Route::get('/blog/{slug}', [
        PublicPostController::class,
        'show'
    ])->name('blog.show');
});
