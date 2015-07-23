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

Route::get('browseTitleAsc', [
	'middleware' => 'auth',  
	'uses' => 'BrowseController@browseByTitleAsc'
]);
Route::get('browseTitleDesc', [
	'middleware' => 'auth',  
	'uses' => 'BrowseController@browseByTitleDesc'
]);
Route::get('browseUsernameAsc', [
	'middleware' => 'auth',  
	'uses' => 'BrowseController@browseByUsernameAsc'
]);
Route::get('browseUsernameDesc', [
	'middleware' => 'auth',  
	'uses' => 'BrowseController@browseByUsernameDesc'
]);
Route::get('browseRatingAsc', [
	'middleware' => 'auth',  
	'uses' => 'BrowseController@browseByRatingAsc'
]);
Route::get('browseRatingDesc', [
	'middleware' => 'auth',  
	'uses' => 'BrowseController@browseByRatingDesc'
]);
Route::get('browseSubjectAsc', [
	'middleware' => 'auth',  
	'uses' => 'BrowseController@browseBySubjectAsc'
]);
Route::get('browseSubjectDesc', [
	'middleware' => 'auth',  
	'uses' => 'BrowseController@browseBySubjectDesc'
]);
Route::get('browseFlashAsc', [
	'middleware' => 'auth',  
	'uses' => 'BrowseController@browseByFlashAsc'
]);
Route::get('browseFlashDesc', [
	'middleware' => 'auth',  
	'uses' => 'BrowseController@browseByFlashDesc'
]);
Route::post('browseSearchBar', [
	'middleware' => 'auth',  
	'uses' => 'BrowseController@browseSearchBar'
]);

Route::get('showProtectedDeck/{id}', [
	'middleware' => 'auth', 
	'uses' => 'BrowseController@showProtectedDeck'
]);

Route::get('study', [
	'middleware' => 'auth', 
	'uses' => 'StudyController@sendListOfDecks'
]);

Route::post('studySelectedDecks', [
	'middleware' => 'auth', 
	'uses' => 'StudyController@studySelectedDecks'
]);

Route::get('studyBack/{id}', [
	'middleware' => 'auth', 
	'uses' => 'StudyController@studyBack'
]);

Route::get('incorrect/{id}', [
	'middleware' => 'auth', 
	'uses' => 'StudyController@incorrect'
]);

Route::get('correct/{id}', [
	'middleware' => 'auth', 
	'uses' => 'StudyController@correct'
]);

Route::get('forum', 
	['middleware' => 'auth', function()
		{
		    return view('forum');
		}
	]
);

Route::resource('decks', 'DeckController');
Route::resource('posts', 'PostController');
Route::resource('flashcards', 'FlashcardController');
Route::resource('notes', 'NoteController');
Route::resource('comments', 'CommentController');
Route::resource('reviews', 'ReviewController');

// Authentication routes... 
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
