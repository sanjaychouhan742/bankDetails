<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;

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

Route::prefix('bank')->group(function(){
  Route::get('add',[BankController::class,'add'])->name('bank.add');
  Route::post('store',[BankController::class,'store'])->name('bank.store'); 
  });
