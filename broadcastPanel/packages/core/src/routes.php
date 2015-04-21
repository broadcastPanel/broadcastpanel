<?php namespace BroadcastPanel\Core;

use Route;

// Attempt to load the dashboard by default, but if they are not logged in they 
// will be redirected to the login page so 's all good.
Route::get(  '/',                 'BroadcastPanel\Core\Controllers\DashboardController@getIndex' );

Route::get(  '/account/login',    'BroadcastPanel\Core\Controllers\AccountController@getLogin'   );
Route::post( '/account/login',    'BroadcastPanel\Core\Controllers\AccountController@postLogin'  );
Route::get(  '/account/logout',   'BroadcastPanel\Core\Controllers\AccountController@getLogout'  );
Route::get(	 '/account/settings', 'BroadcastPanel\Core\Controllers\AccountController@getSettings'  );

Route::get(  '/dashboard/index',  'BroadcastPanel\Core\Controllers\DashboardController@getIndex' );