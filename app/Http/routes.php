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

/* Temporary routes */
Route::get('/', function()
{
    return view('home');
});

Route::get('/home', function()
{
    return view('home');
});

Route::get('dashboard', [
	'middleware' => 'auth', 
	'uses' => 'DashboardController@displayDashboard'
]);

Route::get('study', ['middleware' => 'auth', function()
{
    return view('study');
}]);

Route::get('studyFront', ['middleware' => 'auth', function()
{
    return view('studyFront');
}]);

Route::get('studyBack', ['middleware' => 'auth', function()
{
    return view('studyBack');
}]);

Route::get('browse', ['middleware' => 'auth',  function()
{
    return view('browse');
}]);

Route::get('forum', ['middleware' => 'auth', function()
{
    return view('forum');
}]);


Route::resource('decks', 'DeckController');
Route::resource('posts', 'PostController');
Route::resource('flashcards', 'FlashcardController');
Route::resource('notes', 'NoteController');

/* middleware is not working
Route::resource('flashcards', ['middleware' => 'auth', 'uses' => 'FlashcardController']);
Route::resource('notes', ['middleware' => 'auth', 'uses' => 'ForumController']);
Route::resource('comments', ['middleware' => 'auth', 'uses' => 'MessageController']);
Route::resource('reviews', ['middleware' => 'auth', 'uses' => 'ReviewController']);
*/
// Authentication routes... 
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
