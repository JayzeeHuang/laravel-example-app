<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IPayNowController;

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

Route::controller(UserController::class)->group(function () {
    Route::post('/v1/user', 'store');
    Route::get('/v1/users/{email}', 'show');
    Route::patch('/v1/users/{email}', 'update');
    Route::delete('/v1/users/{email}', 'destroy');
});


Route::controller(IPayNowController::class)->group(function () {
    Route::get('/v1/IPayNow/Alipay/checkout/{sn}', 'Alipay');
});