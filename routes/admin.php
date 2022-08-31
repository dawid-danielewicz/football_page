<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ArticleController;

Route::prefix('admin')->group(function() {
    Route::get('users', [UserController::class, 'index'])->name('admin.users');

    Route::get('articles', [ArticleController::class, 'index'])->name('admin.articles');
});
