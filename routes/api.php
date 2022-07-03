<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;

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
Route::get ('login',[AuthController::class,'login'])->name('login');
Route::post('/login_store', [AuthController::class, 'login_store']);
Route::get ('register',[AuthController::class,'register'])->name('register');
Route::post('/register_store', [AuthController::class, 'register_store'])->name('register');

Route::middleware('auth:api' )->prefix('v1')->group(function () {
  
    // logout
    Route::get('/logout', [AuthController::class, 'logout']);
    

});
route::resource('/articles', ArticleController::class);
route::resource('/category', CategoryController::class);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});



