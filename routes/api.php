<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'api'], function ($router) {
    Route::group(['middleware' => 'auth.jwt'], function ($router) {
        Route::prefix('auth')->group(function () {
            Route::post('/login', [AuthController::class, 'login'])->withoutMiddleware('auth.jwt');
            Route::post('/logout', [AuthController::class, 'logout']);
            Route::post('/refresh', [AuthController::class, 'refresh']);
            Route::post('/me', [AuthController::class, 'me']);
            Route::get('/', [AuthController::class, 'index']);
            Route::post('/', [AuthController::class, 'store']);
        });
        Route::resource('/customers', CustomerController::class);
        Route::resource('/orders', OrderController::class);
    });
});
