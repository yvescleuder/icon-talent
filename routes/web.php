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

Route::get('/', 'AddressController@index')->name('index');
Route::post('/', 'AddressController@store')->name('store');
Route::get('/{address}', 'AddressController@show')->name('show');
Route::put('/{address}', 'AddressController@update')->name('update');
Route::get('/delete/{address}', 'AddressController@destroy')->name('destroy');
