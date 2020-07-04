<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//API Login
Route::get('/login','APILoginController@index');
Route::post('/login','APILoginController@login');

//Manager
Route::get('/manager','ManagerController@index');

Route::middleware('auth:api')->get('/manager/listusers','ManagerController@listusers');
Route::middleware('auth:api')->get('/manager/listbookings/{user}','ManagerController@listbookings');
Route::middleware('auth:api')->delete('/manager/listbookings/{user}','ManagerController@destroy');
Route::middleware('auth:api')->put('/manager/listbookings/{booking}','ManagerController@update');
Route::middleware('auth:api')->get('/prueba','ManagerController@prueba');
