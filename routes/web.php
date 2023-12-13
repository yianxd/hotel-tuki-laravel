<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TypeRoomController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HomeController;

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

Route::get('/',function(){return view('welcome');});
Route::resource('/user', UserController::class);
Route::resource('/customer',CustomerController::class);
Route::resource('/employee',EmployeeController::class);
Route::resource('/products',ProductsController::class);
Route::resource('/service',ServiceController::class);
Route::resource('/type_room',TypeRoomController::class);
Route::resource('/room',RoomController::class);
Route::get('login', [LoginController::class,'index'])->name('login');
Route::post('logout', [LogoutController::class,'store'])->name('logout');
Route::post('login', [LoginController::class,'store']);
Route::get('/home', [HomeController::class,'index'])->name('home.index')->middleware('auth');
Route::get('/soport',function(){return view('soport');})->name('soport');
Route::post('/register', [UserController::class,'store'])->name('register');
