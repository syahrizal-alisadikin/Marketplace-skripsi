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

Route::GET('/register/check', 'MarketController@check')->name('check-register');
Route::GET('/provinces', 'Api\LocationController@Provinces')->name('api-provinces');
Route::GET('/regencies/{province_id}', 'Api\LocationController@Regencies')->name('api-regencies');
Route::GET('/city/{province_id}', 'Api\LocationController@City')->name('api-city');
Route::GET('/city_id/{city_id}', 'Api\LocationController@City_ID')->name('api-city_id');
Route::POST('/rajaongkir/checkOngkir', 'Api\LocationController@checkOngkir')->name('api-checkOngkir');
Route::POST('/cart/increment', 'Api\LocationController@cartIncrement')->name('api-cart-increment');
Route::POST('/cart/decrement', 'Api\LocationController@cartDecrement')->name('api-cart-decrement');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
