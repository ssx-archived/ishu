<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Below are the two routes used by Ishu
|
*/

Route::get('/', 		'IssueController@getSubmitIssue');
Route::post('/', 		'IssueController@postSubmitIssue');
Route::get('/thanks', 	'IssueController@getThanks');

Route::get('/contact', 	'ContactController@getContact');



/*
|--------------------------------------------------------------------------
| Authentication & Password Reset Controllers
|--------------------------------------------------------------------------
|
| These two controllers handle the authentication of the users of your
| application, as well as the functions necessary for resetting the
| passwords for your users. You may modify or remove these files.
|
*/

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
