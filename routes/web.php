<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ArticleController;
use App\Models\Article;

Route::get('/', [MainController::class, 'index'])->name('login');
Route::get('/loginGuest', [MainController::class, 'loginGuest'])->name('loginGuest');
Route::post('/checklogin', [MainController::class, 'checklogin'])->name('checklogin');
Route::get('/guestHome', [MainController::class, 'guestHome'])->name('guestHome')->middleware('auth');
Route::get('/logout', [MainController::class, 'logout'])->name('logout')->middleware('auth.basic');
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit')->middleware('can:update,article');
Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update')->middleware('can:update,article');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create')->middleware('can:create,' . Article::class);
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store')->middleware('can:create,' . Article::class);
Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy')->middleware('can:delete,article');
