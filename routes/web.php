<?php

use Illuminate\Support\Facades\Route;
use Lumki\Lumki\Http\Controllers\PostController;

//Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
//Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::group([
    'middleware' => config('lumki.middleware', ['web', 'auth:sanctum']),
    'namespace' => 'Lumki\Lumki\Http\Controllers',
], function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
});
