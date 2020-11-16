<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SellingController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DebtController;
use App\Http\Controllers\DashboardController;
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
    return view('dashboard');
});
Route::resource('dashboard', DashboardController::class);
Route::resource('stock', BookController::class);
Route::resource('purchase', PurchaseController::class);
Route::resource('order', OrderController::class);
Route::resource('selling', SellingController::class);
Route::resource('debt', DebtController::class);