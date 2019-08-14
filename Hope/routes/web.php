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

Route::get('/', function () {
    return view('welcome');
});

// Route::group(['prefix'=>'countries'],function(){

// 	Route::get('/get-all-countries','Api\CountryController@getAllCountriesWithPage');

// 	Route::get('/get-country','Api\CountryController@show');

// 	Route::get('/get-country-by-code','Api\CountryController@showByCountryCode');

// 	Route::post('/create-country','Api\CountryController@store');

// 	Route::put('/update-country','Api\CountryController@update');
// });

//admin page
Route::group(['prefix'=>'admin'],function(){

	Route::get('/login','Auth\LoginController@login')->name('login');

	Route::post('/login/in-progress','Auth\LoginController@authenticate')->name('login-progress');

	Route::post('/sign-up/in-progress','Auth\LoginController@create')->name('register');
	
	
	Route::group(['middleware'=>'auth:web'],function(){
		Route::get('/logout','Auth\LoginController@logout')->name('logout');	
		Route::get('/','Admin\AdminCountryController@index')->name('index');

		Route::get('/countries/edit/{id}','Admin\AdminCountryController@edit')->name('edit');

		Route::post('/countries/edit/edit-progress/{id}','Admin\AdminCountryController@update')->name('update');

		Route::get('/countries/create','Admin\AdminCountryController@create')->name('create');

		Route::post('/countries/create/save','Admin\AdminCountryController@store')->name('insert-data');

		Route::get('/countries/delete/{id}','Admin\AdminCountryController@destroy')->name('delete');
	});
});

