<?php

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

Route::get('/', 'CryptographyController@sign');

Route::get('sign', 'CryptographyController@sign')->name('view_sign');
Route::get('verify', function() {
    return view('verify');
})->name('view_verify');
Route::post('sign', 'CryptographyController@create_signatures')->name('sign.create');
Route::post('verify', 'CryptographyController@verifies_signatures')->name('verify');