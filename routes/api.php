<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\MeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\BillReportExportController;
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


Route::controller(LoginController::class)->group(function () {
    Route::post('/v1/login', 'login');
    Route::get('/v1/logout', 'logout');
    Route::get('/v1/refresh', 'refresh');
});
    
Route::controller(RegisterController::class)->group(function () {
    Route::post('/v1/register', 'store');
});

Route::controller(MeController::class)->group(function () {
    Route::get('/v1/user', 'show');
    Route::patch('/v1/user', 'update');
    Route::delete('/v1/user', 'destroy');
});

Route::controller(IPayNowController::class)->group(function () {
    Route::get('/v1/bills/{sn}/payments/{gateway}/{provider}/{type}', 'init');
    Route::any('/v1/payments/{payment}', 'create');

});

Route::prefix('/v1/admin')->group(function () {
    Route::get('/users', [UserController::class, 'get']);
    Route::get('/bills', [BillController::class, 'get']);
    Route::patch('/bills/{sn}', [BillController::class, 'update']);
    Route::get('/payments', [PaymentController::class, 'get']);
    Route::get('/bills/reports/export/{format}', [BillReportExportController::class, 'export']);


});

Route::get('/v1/email/bills/{sn}', function($sn){
    $details['email'] = 'tester@test.co.nz';
    dispatch(new App\Jobs\EmailBill($details));
    return response()->json(array('status' => 'success'));
});