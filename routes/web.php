<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\HostleController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AjaxPraticeController;
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
Route::prefix('admin')->group(function(){
     Route::get('user',[LoginController::class,'user']);
    Route::get('/',[LoginController::class,'index'])->name('login.index');
    Route::post('authentication',[LoginController::class,'autentication'])->name('check.auth');

Route::group(['middleware'=>['is_admin']],function(){

Route::prefix('student')->group(function () {
Route::get('/',[StudentController::class,'index'])->name('student.index');
Route::get('add',[StudentController::class,'add'])->name('students.add');
Route::post('store',[StudentController::class,'store'])->name('students.store');
Route::get('edit/{id}',[StudentController::class,'edit'])->name('students.edit');
Route::post('update',[StudentController::class,'update'])->name('students.update');
Route::get('delete/{id}',[StudentController::class,'delete'])->name('students.delete');
});

Route::prefix('ajax')->group(function () {
		    Route::post('/get-data',[AjaxController::class,'getData'])->name('get_data_by_ajax');
		});
Route::prefix('teachers')->group(function(){
     Route::get('/',[TeachersController::class,'index'])->name('teachers.index');
     Route::get('add',[TeachersController::class,'add'])->name('teachers.add');
     Route::post('store',[TeachersController::class,'store'])->name('teachers.store');
     Route::get('edit/{id}',[TeachersController::class,'edit'])->name('teachers.edit');
     Route::post('update',[TeachersController::class,'update'])->name('teachers.update');
     Route::get('delete/{id}',[TeachersController::class,'delete'])->name('teachers.delete');
});

Route::prefix('hostel')->group(function(){
     Route::get('/',[HostleController::class,'index'])->name('hostel.index');
     Route::get('add',[HostleController::class,'add'])->name('hostel.add');
     Route::post('store',[HostleController::class,'store'])->name('hostel.store');
     Route::get('edit/{id}',[HostleController::class,'edit'])->name('hostel.edit');
     Route::post('update',[HostleController::class,'update'])->name('hostel.update');
     Route::get('delete/{id}',[HostleController::class,'delete'])->name('hostel.delete');
});

Route::prefix('token')->group(function(){
    Route::get('/',[TokenController::class,'index'])->name('token.index');
    Route::get('add',[TokenController::class,'add'])->name('token.add');
    Route::post('store',[TokenController::class,'store'])->name('token.store');
    Route::get('edit/{id}',[TokenController::class,'edit'])->name('token.edit');
    Route::post('update',[TokenController::class,'update'])->name('token.update');
    Route::get('delete/{id}',[TokenController::class,'delete'])->name('token.delete');
});

Route::prefix('home')->group(function(){
   Route::get('welcome',[TokenController::class,'index_home'])->name('home.index');
});

Route::prefix('ajax')->group(function(){
  Route::get('/',[AjaxPraticeController::class,'index'])->name('ajax.index');
  Route::get('ajax-fetch',[AjaxPraticeController::class,'ajaxFetch'])->name('ajax.fetch');
  Route::get('add',[AjaxPraticeController::class,'add'])->name('ajax.add');
  Route::post('store',[AjaxPraticeController::class,'store'])->name('ajax.store');
  Route::get('edit/{id}',[AjaxPraticeController::class,'edit'])->name('ajax.edit');
  Route::post('update',[AjaxPraticeController::class,'update'])->name('ajax.update'); 
  });

Route::prefix('bank')->group(function(){
  Route::get('add',[BankController::class,'add'])->name('bank.add');
  Route::post('store',[BankController::class,'store'])->name('bank.store'); 
  });
 });
});

Route::prefix('userFront')->group(function (){
Route::get('front',[TokenController::class,'user_front'])->name('front.user');
});