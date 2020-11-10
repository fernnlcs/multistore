<?php

use App\Http\Controllers\Store\Formal\StoreController;
use App\Http\Controllers\Store\Product\ProductController;
use App\Http\Controllers\Store\Team\Employee\EmployeeController;
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

Route::get('/', [StoreController::class, 'index'])->middleware('auth');

Route::resource('loja', StoreController::class)->names('store')->parameters(['loja' => 'store'])->middleware('auth');

Route::resource('funcionario', EmployeeController::class)->names('employee')->parameters(['funcionario' => 'employee'])->except('index')->middleware('auth');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
