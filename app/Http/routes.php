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

Route::get('/', function () {
    return view('index');
});

Route::group(['prefix' => 'api'], function()
{
	/*Route::resource('authenticate', 'authenticateController', ['only' => ['index']]);
	Route::post('authenticate', 'authenticateController@authenticate');
	Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser');*/

	Route::resource('/contacts', 'ContactsController');
	Route::resource('/team', 'TeamController');
	Route::resource('/user', 'UserController');

	Route::post('/sms', 'SmsController@sendSms');

	Route::get('/team/{id}/members', 'TeamController@members');
	Route::post('/member', 'UserController@newMember');
	Route::get('/team/{id}/{teamid}', 'TeamController@remove');
});

Route::auth();

Route::group(['as' => 'user::'], function () {
	Route::get('/send', ['as' => 'send', 'uses' => 'HomeController@index']);
	Route::get('/profile', ['as' => 'profile', 'uses' => 'UserController@profile']);
	Route::get('/settings', ['as' => 'settings', 'uses' => 'UserController@settings']);
	Route::get('/help', ['as' => 'help', 'uses' => 'UserController@help']);
	Route::get('/phonebook', ['as' => 'phonebook', 'uses' => 'ContactsController@display']);
	Route::get('/team', ['as' => 'team', 'uses' => 'TeamController@display']);
	Route::get('/newteam', ['as' => 'addTeam', 'uses' => 'TeamController@create']);
	Route::get('/admin', ['as' => 'admin', 'uses' => 'AdminController@display']);
});
