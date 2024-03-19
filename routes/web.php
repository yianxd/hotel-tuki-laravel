<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TypeRoomController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LoginadminController;
use App\Http\Controllers\RegisterAdminController;
use App\Http\Controllers\RegisterUsersController;
use App\Http\Controllers\BedsController;

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

/*Modulo reserva */

Route::resource('/customer',CustomerController::class)->middleware('auth');
Route::resource('/booking', BookingController::class)->middleware('auth');


/*Modulo Admin */

Route::resource('/service',ServiceController::class)->middleware('auth');
Route::resource('/room',RoomController::class)->middleware('auth');
Route::resource('/beds',BedsController::class)->middleware('auth');

Route::resource('/inventory',InventoryController::class)->middleware('auth');
Route::resource('/bills',BillController::class)->middleware('auth');

Route::get('/products', [ProductsController::class, 'index'])->name('products.index')->middleware('auth');
Route::get('/room', [RoomController::class, 'index'])->name('room.index')->middleware('auth');

Route::get('/service', [ServiceController::class, 'index'])->name('service.index')->middleware('guest');
Route::get('/register/user', [RegisterUsersController::class, 'create'])->name('register.user.create');
Route::post('/register/user/store', [RegisterUsersController::class, 'store'])->name('register.user.store')->middleware('auth');

/*Modulo Login */

Route::get('login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('logout', [LogoutController::class,'store'])->name('logout');
Route::post('login', [LoginController::class,'store'])->middleware('guest');

Route::post('/register/admin', [RegisterAdminController::class, 'create'])->name('register.admin.create');
Route::get('/home', [HomeController::class,'index'])->name('home.index')->middleware('auth');

Route::get('/soport',function(){return view('soport');})->name('soport')->middleware('auth');


/*Modulo factura */
Route::get('/bill', [BillController::class, 'index'])->name('bill.index')->middleware('auth');
Route::get('/bill/create', [BillController::class, 'create'])->name('bill.create')->middleware('auth');








