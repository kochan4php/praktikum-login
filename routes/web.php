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

// Route::resource('/supplier', SupplierController::class)->except('show');
Route::controller(SupplierController::class)->middleware(['auth', 'level:1,2'])->group(function () {
  Route::get('/supplier', 'index')->name('supplier.index')->withoutMiddleware('level:1,2');
  Route::post('/supplier', 'store')->name('supplier.store');
  Route::get('/supplire/create', 'create')->name('supplier.create');
  Route::put('/supplier/{supplier}', 'update')->name('supplier.update');
  Route::delete('/supplier/{supplier}', 'destroy')->name('supplier.destroy');
  Route::get('/supplier/{supplier}/edit', 'edit')->name('supplier.edit');
});
Route::get('/login', [AuthController::class, 'index'])
  ->name('login')
  ->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])
  ->name('login.authenticate')
  ->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])
  ->name('logout')
  ->middleware('auth');
