<?php

use App\Http\Controllers\{
  AuthController,
  SupplierController
};
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

Route::redirect('/', '/supplier');

Route::get('/list-supplier', [SupplierController::class, 'index'])->middleware('auth');
Route::resource('/supplier', SupplierController::class)->except('show');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
