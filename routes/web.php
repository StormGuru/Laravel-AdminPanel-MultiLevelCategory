<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\CategoryController;
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

Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function(){
Route::resource('/category', 'CategoryController')->names('categories');
Route::get('/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('categories.destroy');
  
Route::resource('/sub_category', 'SubCategoryController')->names('sub_categories');
Route::get('/sub_category/delete/{id}', [App\Http\Controllers\SubCategoryController::class, 'destroy'])->name('sub_categories.destroy');

Route::resource('/sub_sub_category', 'SubSubCategoryController')->names('sub_sub_categories');
Route::get('/sub_sub_category/delete/{id}', [App\Http\Controllers\SubSubCategoryController::class, 'destroy'])->name('sub_sub_categories.destroy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
