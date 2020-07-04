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

//No Login Routes
Route::get('/', 'HomeController@index')->name('home');
Route::get('/calculator', 'CalculatorController')->name('calculator');
Route::get('/calculator', 'CalculatorController')->name('calculator');
Route::get('/contact', 'ContactController')->name('contact');

Route::group(['middleware' => 'auth'], function (){
    Route::get('/booking','BookingController@index')->name('booking.index');
    Route::get('/booking/create','BookingController@create')->name('booking.create');
    Route::post('/booking','BookingController@store')->name('booking.store');
    Route::get('/booking/{booking}/edit','BookingController@edit')->name('booking.edit');
    Route::put('/booking/{booking}','BookingController@update')->name('booking.update');
    Route::delete('/booking/{booking}','BookingController@destroy')->name('booking.destroy');
    Route::get('/manager','APILoginController@index')->name('manager.login');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
