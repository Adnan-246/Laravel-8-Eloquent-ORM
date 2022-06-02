<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChangepassController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Auth::routes();

//_-Email Verification method__//
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

      return redirect('/home');
      })->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/email/verify', function () {
      return view('auth.verify-email');
      })->middleware('auth')->name('verification.notice');

      //____//

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('category/index',[App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category.index');
Route::get('category/create',[App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('category.create');
Route::post('category/store',[App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('category.store');
Route::get('category/edit/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('category.edit');
Route::post('category/update/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('category.update');
Route::get('category/delete/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('category.delete');

//__Password Change Routes__//
Route::get('change/password', [App\Http\Controllers\Admin\ChangepassController::class, 'changepass'])->name('password.change');
Route::post('/change/password/update',  [App\Http\Controllers\Admin\ChangepassController::class, 'updatePassword'])->name('update.password');
