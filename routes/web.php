<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/greeting', function () {
    return 'greeting';
});
Route::get('/uploadfile', 'UploadfileController@index');
Route::post('/uploadfile', 'UploadfileController@upload');
Route::get('/', [MainController::class, 'index']);
Route::post('/checklogin', [MainController::class, 'checklogin']);
Route::get('/successlogin', [MainController::class, 'successlogin']);
Route::get('/loginGuest', [MainController::class, 'loginGuest']);
Route::get('/logout', [MainController::class, 'logout']);
