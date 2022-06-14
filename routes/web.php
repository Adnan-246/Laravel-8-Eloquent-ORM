<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\ChangepassController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\lookup_tbl\CountryController;
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
    return view('auth.login');
});

// Route::get('login',[App\Http\Controllers\HomeController::class, 'index'])->name('login');

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

//__Profile Routes__//
Route::get('admin/profile', [App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('admin.profile');
Route::get('admin/profile/edit/{id}', [App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('admin.profile.edit');
Route::post('admin/profile/update/{id}', [App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('admin.profile.update');

//__SubCategory Routes__//
Route::get('subcategory/index',[App\Http\Controllers\Admin\SubcategoryController::class, 'index'])->name('subcategory.index');
Route::get('subcategory/create',[App\Http\Controllers\Admin\SubcategoryController::class, 'create'])->name('subcategory.create');
Route::post('subcategory/store',[App\Http\Controllers\Admin\SubcategoryController::class, 'store'])->name('subcategory.store');

//__Country Routes__//
Route::get('country/index',[App\Http\Controllers\lookup_tbl\CountryController::class, 'index'])->name('country.index');
Route::get('country/create',[App\Http\Controllers\lookup_tbl\CountryController::class, 'create'])->name('country.create');
Route::post('country/store',[App\Http\Controllers\lookup_tbl\CountryController::class, 'store'])->name('country.store');
Route::get('country/edit/{id}',[App\Http\Controllers\lookup_tbl\CountryController::class, 'edit'])->name('country.edit');
Route::post('country/update/{id}',[App\Http\Controllers\lookup_tbl\CountryController::class, 'update'])->name('country.update');
Route::get('country/delete/{id}',[App\Http\Controllers\lookup_tbl\CountryController::class, 'destroy'])->name('country.delete');
