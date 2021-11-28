<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index']);

Route::post('pay', [App\Http\Controllers\SSLCommerzController::class, 'pay']);
Route::post('success', [App\Http\Controllers\SSLCommerzController::class, 'success']);
Route::post('fail', [App\Http\Controllers\SSLCommerzController::class, 'fail']);
Route::post('cancel', [App\Http\Controllers\SSLCommerzController::class, 'cancel']);
Route::post('ipn', [App\Http\Controllers\SSLCommerzController::class, 'ipn']);
