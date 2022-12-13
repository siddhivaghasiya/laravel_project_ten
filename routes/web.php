<?php

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

Route::get('/', function () {
    return view('welcome');
});



Route::get('admin/register','\App\Http\Controllers\RegisterController@index')->name('registerform');
Route::post('admin/register/store','\App\Http\Controllers\RegisterController@store')->name('register.store');

Route::get('admin/login','\App\Http\Controllers\LoginController@create')->name('login.create');
Route::any('login_post','\App\Http\Controllers\LoginController@loginpost')->name('login_post');

Route::any('features/save','\App\Http\Controllers\featurecontroller@save')->name('features.save');

Route::resource('features','\App\Http\Controllers\FeaturesController');

Route::any('features/listing','\App\Http\Controllers\FeaturesController@ajaxlisting')->name('features.listing');


