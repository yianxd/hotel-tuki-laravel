<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BedsController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductsController;

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

Route::resource('/room',RoomController::class);
Route::resource('/beds',BedsController::class);
Route::resource('/inventory',InventoryController::class);
Route::resource('/products',ProductsController::class);

