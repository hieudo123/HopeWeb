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

Route::middleware('auth:api')->post('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'countries'],function(){

	Route::get('/get-all-countries','Api\CountryController@getAllCountriesWithPage');

	Route::get('/get-country','Api\CountryController@show');

	Route::get('/get-country-by-code','Api\CountryController@showByCountryCode');

	Route::post('/create-country','Api\CountryController@store');

	Route::put('/update-country','Api\CountryController@update');

	Route::delete('/delete-country/{id}','Api\CountryController@destroy');

});