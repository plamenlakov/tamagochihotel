<?php

use Illuminate\Http\Request;

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

//Tamagotchi API Routes
Route::get('tamagotchis', 'TamagotchiController@index');
Route::get('tamagotchis/{id}', 'TamagotchiController@show');
Route::post('tamagotchis', 'TamagotchiController@store');
Route::put('tamagotchis/{id}', 'TamagotchiController@update');
Route::delete('tamagotchis/{id}', 'TamagotchiController@delete');

//Room API Routes
Route::get('rooms', 'RoomController@index');
Route::get('rooms/{id}', 'RoomController@show');
Route::post('rooms', 'RoomController@store');
Route::put('rooms/{id}', 'RoomController@update');
Route::delete('rooms/{id}', 'RoomController@delete');

//Booking API Routes
Route::get('bookings', 'BookingController@index');
Route::get('bookings/{id}', 'BookingController@show');
Route::post('bookings', 'BookingController@store');
Route::put('bookings/{id}', 'BookingController@update');
Route::delete('bookings/{id}', 'BookingController@delete');
