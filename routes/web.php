<?php

use Illuminate\Support\Facades\Route;
use Lumki\Lumki\Http\Controllers\PostController;

Route::get('/posts', PostController::class)->name('posts.index');
//Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
//Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
