<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BillController;

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
Route::get('bills/pdf',[BillController::class,'pdf'])->name('bill.pdf');
Route::resource('/user', UserController::class);
Route::resource('/customer',CustomerController::class);
Route::resource('/employee',EmployeeController::class);
Route::resource('/service',ServiceController::class);
Route::resource('/bills',BillController::class);
Route::resource('/booking',BookingController::class);
Route::resource('/customer',CustomerController::class);


