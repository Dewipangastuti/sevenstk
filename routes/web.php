<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockBarangController;
use App\Http\Controllers\SkuValueController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\forgotpwController;
use App\Http\Controllers\inputController;
use App\Http\Controllers\tokenController;
use App\Http\Controllers\profilController;

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

Route::get('/', static function () {
    return view('welcome');
});

Route::get('/stocks', [SkuValueController::class, 'index_view']);
Route::get('/cari',[SkuValueController::class, 'cari']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/login', [loginController::class, 'login']);
Route::get('/register', [registerController::class, 'register']);
Route::get('/forgotpw', [forgotpwController::class, 'forgotpw']);
Route::get('/input', [inputController::class, 'input']);
Route::get('/token', [tokenController::class, 'token']);
Route::get('/profil', [profilController::class, 'profil']);

