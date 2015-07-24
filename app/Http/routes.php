<?php

/*
	When users go to the root url, they are sent home.blade.php
*/
Route::get('/', function()
{
    return view('home');
});

/*
	When users go to the root url, they are sent home.blade.php
*/
Route::get('/home', function()
{
    return view('home');
});

/* 
	When users go to the /dashboard url, the displayDashboard function
	on the DashboardController is called.
*/
Route::get('dashboard', [
	'middleware' => 'auth', 
	'uses' => 'DashboardController@displayDashboard'
]);

/*
	The following routes call various functions on the BrowseController.
	These functions sort the public decks by various attributes/columns.
*/
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

// Begin routes added by kittipak
// Route::get('browseTitlePostAsc', [
//     'middleware' => 'auth',
//     'uses' => 'ForumController@browseTitlePostAsc'
// ]);
// Route::get('browseTitlePostDesc', [
//     'middleware' => 'auth',
//     'uses' => 'ForumController@browseTitlePostDesc'
// ]);
// Route::get('browseUsernamePostAsc', [
//     'middleware' => 'auth',
//     'uses' => 'ForumController@browseUsernamePostAsc'
// ]);
// Route::get('browseUsernamePostDesc', [
//     'middleware' => 'auth',
//     'uses' => 'ForumController@browseUsernamePostDesc'
// ]);
// Route::get('browseTopicPostAsc', [
//     'middleware' => 'auth',
//     'uses' => 'ForumController@browseTopicPostAsc'
// ]);
// Route::get('browseTopicPostDesc', [
//     'middleware' => 'auth',
//     'uses' => 'ForumController@browseTopicPostDesc'
// ]);
// Route::get('browsePublishDatePostAsc', [
//     'middleware' => 'auth',
//     'uses' => 'ForumController@browsePublishDatePostAsc'
// ]);
// Route::get('browsePublishDatePostDesc', [
//     'middleware' => 'auth',
//     'uses' => 'ForumController@browsePublishDatePostDesc'
// ]);
// Route::get('browseScorePostAsc', [
//     'middleware' => 'auth',
//     'uses' => 'ForumController@browseScorePostAsc'
// ]);
// Route::get('browseScorePostDesc', [
//     'middleware' => 'auth',
//     'uses' => 'ForumController@browseScorePostDesc'
// ]);
// Route::post('browseSearchBarPost', [
//     'middleware' => 'auth',
//     'uses' => 'ForumController@browseSearchBarPost'
// ]);
// Route::get('posts/{id}', 'PostController@show_post_forum');
// Route::post('AddComment', 'CommentController@store');
// End routes added by kittipak

/*
	The following routes call the various functions on the StudyController.
	These functions allow users to select multiple decks to study flashcards from.
*/
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

/*
	The following lines produce routes for the create, update, delete, and retrieve
	functions on the controllers.
*/
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
