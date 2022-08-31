<?php

use App\Http\Controllers\Front\ArticleController;
use App\Http\Controllers\Front\CommentController;
use App\Http\Controllers\Front\CurrentSeasonController;
use App\Http\Controllers\Front\FunFactController;
use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Front\MatchListController;
use App\Http\Controllers\Front\PlayerController;
use App\Http\Controllers\Front\RoundController;
use App\Http\Controllers\Front\UserController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('home')->middleware('banned');

Route::controller(ArticleController::class)->group(function() {
    Route::get('/articles', 'index')->name('articles.index');
    Route::get('/articles/create', 'create')->name('articles.create');
    Route::get('/articles/{id}', 'show')->name('articles.show');
    Route::post('/articles', 'store')->name('articles.store');
    Route::get('/articles/{article}/edit', 'edit')->name('articles.edit');
    Route::put('/articles/{id}', 'update')->name('articles.update');
    Route::delete('/articles/{id}', 'destroy')->name('articles.destroy');
});

Route::controller(CurrentSeasonController::class)->group(function() {
    Route::get('/table', 'index')->name('table.index');
    Route::get('/table/create', 'create')->name('table.create');
    Route::post('/table', 'store')->name('table.store');
    Route::get('/table/{id}/edit', 'edit')->name('table.edit');
    Route::put('/table/{id}', 'update')->name('table.update');
    Route::delete('/table/{id}', 'delete')->name('table.delete');
});

Route::controller(PlayerController::class)->group(function() {
    Route::get('/players', 'index')->name('players.index');
    Route::get('/players/create', 'create')->name('players.create');
    Route::post('/players', 'store')->name('players.store');
    Route::get('/players/{id}/edit', 'edit')->name('players.edit');
    Route::put('/players/{id}', 'update')->name('players.update');
    Route::delete('/players/{id}', 'delete')->name('players.delete');
});

Route::controller(RoundController::class)->group(function() {
    Route::get('/rounds', 'index')->name('rounds.index');
    Route::get('/rounds/create', 'create')->name('rounds.create');
    Route::post('/rounds', 'store')->name('rounds.store');
    Route::get('/rounds/{id}/edit', 'edit')->name('rounds.edit');
    Route::put('/rounds/{id}', 'update')->name('rounds.update');
    Route::delete('/rounds/{id}', 'delete')->name('rounds.delete');
});

Route::controller(MatchListController::class)->group(function() {
    Route::get('/matches', 'index')->name('matches.index');
    Route::get('/matches/create', 'create')->name('matches.create');
    Route::post('/matches', 'store')->name('matches.store');
    Route::get('/matches/{id}/edit', 'edit')->name('matches.edit');
    Route::put('/matches/{id}', 'update')->name('matches.update');
    Route::delete('/matches/{id}', 'delete')->name('matches.delete');
});

Route::controller(FunFactController::class)->group(function() {
    Route::get('/facts', 'index')->name('facts.index');
    Route::get('/facts/create', 'create')->name('facts.create');
    Route::post('/facts', 'store')->name('facts.store');
    Route::get('/facts/{id}/edit', 'edit')->name('facts.edit');
    Route::put('/facts/{id}', 'update')->name('facts.update');
    Route::delete('/facts/{id}', 'delete')->name('facts.delete');
});

Route::controller(CommentController::class)->group(function() {
    Route::get('/comments', 'index')->name('comments.index');
    Route::get('/comments/create', 'create')->name('comments.create');
    Route::post('/comments', 'store')->name('comments.store');
    Route::get('/comments/{id}/edit', 'edit')->name('comments.edit');
    Route::put('/comments/{id}', 'update')->name('comments.update');
    Route::delete('/comments/{id}', 'delete')->name('comments.delete');
});

Route::get('/users/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('/banned', [UserController::class, 'ban'])->name('users.banned');


require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
