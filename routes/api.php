<?php

use App\Http\Controllers\SkuValueController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//seeder login api
Route::middleware('auth:api')->get('/user', static function (Request $request) {
    return $request->user();
});

//routing register api
Route::post('stocks/reg', [registerController::class,'reg']);
//routing login user api
Route::post('stocks/auth', [loginController::class,'auth']);



//route group protected Api token
Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's
    Route::get('stocks/export', [SkuValueController::class,'export']);
    Route::get('stocks', [SkuValueController::class, 'index']);
    Route::post('stocks', [SkuValueController::class, 'store']);
    Route::put('/stocks/{id}', [SkuValueController::class, 'update']);
    Route::delete('/stocks/{id}', [SkuValueController::class, 'delete']);
    Route::get('stocks', [SkuValueController::class, 'cari']);
    Route::post('stocks/logout', [UserController::class, 'logout']);
    // Route::post('stocks/logoutall', 'UserController@logoutall');
    });


