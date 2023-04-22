<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', [\App\Http\Controllers\MainController::class, 'index']) -> name('home');
Route::post('/checklogin', [\App\Http\Controllers\MainController::class, 'checklogin']);
Route::get('/successlogin', [\App\Http\Controllers\ArticleController::class, 'loginGuest']);
Route::get('/loginGuest', [\App\Http\Controllers\ArticleController::class, 'loginGuest']) -> name('loginGuest');
Route::get('/logout', [\App\Http\Controllers\MainController::class, 'logout']) -> name('logout');
Route::get('/articles/{article}/edit', [\App\Http\Controllers\ArticleController::class, 'edit'])->name('articles.edit');
Route::put('/articles/{article}', [\App\Http\Controllers\ArticleController::class, 'update'])->name('articles.update');
Route::get('/articles/create', [App\Http\Controllers\ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles', [App\Http\Controllers\ArticleController::class, 'store'])->name('articles.store');
Route::delete('/articles/{id}', [App\Http\Controllers\ArticleController::class, 'destroy'])->name('articles.destroy');






