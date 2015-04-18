<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get(  '/account/login',   'AccountController@getLogin'   );
Route::post( '/account/login',   'AccountController@postLogin'  );
Route::get(  '/account/logout',  'AccountController@getLogout'  );

Route::get(  '/dashboard/index', 'DashboardController@getIndex' ); 
