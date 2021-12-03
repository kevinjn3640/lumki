<?php

use Illuminate\Support\Facades\Route;
use Lumki\Lumki\Http\Controllers\UserController;

//Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
//Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::group([
    'middleware' => config('lumki.middleware', ['web', 'auth:sanctum', 'role:Superadmin', \Laravel\Jetstream\Http\Middleware\ShareInertiaData::class]),
    'namespace' => 'Lumki\Lumki\Http\Controllers',
], function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
});
