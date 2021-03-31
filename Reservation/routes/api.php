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

/* Reservations */
Route::get('/reservations/{date}/{city}', 'ReservationController@getReservations');
Route::post('/reservations', 'ReservationController@store');

/* Games/Rooms */
Route::get('/games/{city}','GameController@getGames');
/* localhost:8000/reservations/2021-03-25 */