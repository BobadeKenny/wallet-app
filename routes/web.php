<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', function () {
    return view('home');
});


Route::get('/withdraw', [App\Http\Controllers\BalanceController::class, "withdraw"]);
Route::post('/withdrawal', [App\Http\Controllers\BalanceController::class, "withdrawal"])->middleware(['verified']);;
Route::get('/deposit', [App\Http\Controllers\BalanceController::class, "deposit"]);
Route::post('/fund', [App\Http\Controllers\BalanceController::class, "fund"]);
Route::get('/transfer', [App\Http\Controllers\BalanceController::class, "transfer"])->middleware(['verified']);;
Route::post('/maketransfer', [App\Http\Controllers\BalanceController::class, "maketransfer"]);
Route::get('/transactions', [App\Http\Controllers\BalanceController::class, "transactions"]);
Route::get('/profile', [App\Http\Controllers\ViewController::class, "profile"]);
Route::post('/updateuser', [App\Http\Controllers\UserController::class, "updateUser"]);
Route::get('/searchusername', [App\Http\Controllers\SearchController::class, "searchUsername"]);
Route::get('/searchemail', [App\Http\Controllers\SearchController::class, "searchEmail"]);
Route::get('/searchuser', [App\Http\Controllers\SearchController::class, "searchUser"]);

Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback']);

Route::post('/pay', [App\Http\Controllers\PaymentController::class, 'redirectToGateway'])->name('pay');