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

Route::get('showProtectedFlashcard/{id}', [
	'middleware' => 'auth', 
	'uses' => 'BrowseController@showProtectedFlashcard'
]);

/*
	The following routes call various functions on the ForumController.
	These functions sort the forum posts by various attributes/columns.
*/
Route::get('forumTitleAsc', [
    'middleware' => 'auth',
    'uses' => 'ForumController@forumTitleAsc'
]);
Route::get('forumTitleDesc', [
    'middleware' => 'auth',
    'uses' => 'ForumController@forumTitleDesc'
]);
Route::get('forumUsernameAsc', [
    'middleware' => 'auth',
    'uses' => 'ForumController@forumUsernameAsc'
]);
Route::get('forumUsernameDesc', [
    'middleware' => 'auth',
    'uses' => 'ForumController@forumUsernameDesc'
]);
Route::get('forumTopicAsc', [
    'middleware' => 'auth',
    'uses' => 'ForumController@forumTopicAsc'
]);
Route::get('forumTopicDesc', [
    'middleware' => 'auth',
    'uses' => 'ForumController@forumTopicDesc'
]);
Route::get('forumPublishDateAsc', [
    'middleware' => 'auth',
    'uses' => 'ForumController@forumPublishDateAsc'
]);
Route::get('forumPublishDateDesc', [
    'middleware' => 'auth',
    'uses' => 'ForumController@forumPublishDateDesc'
]);
Route::get('forumScoreAsc', [
    'middleware' => 'auth',
    'uses' => 'ForumController@forumScoreAsc'
]);
Route::get('forumScoreDesc', [
    'middleware' => 'auth',
    'uses' => 'ForumController@forumScoreDesc'
]);
Route::post('forumSearchBar', [
    'middleware' => 'auth',
    'uses' => 'ForumController@forumSearchBar'
]);

Route::get('showProtectedPost/{id}', [
	'middleware' => 'auth', 
	'uses' => 'ForumController@showProtectedPost'
]);

/*
	The following routes allow users to upvote posts, comments, and notes.
*/
Route::get('upvotePost/{id}', [
	'middleware' => 'auth', 
	'uses' => 'PostController@upvote'
]);

Route::get('upvoteComment/{id}', [
	'middleware' => 'auth', 
	'uses' => 'CommentController@upvote'
]);

Route::get('upvoteNote/{id}', [
	'middleware' => 'auth', 
	'uses' => 'NoteController@upvote'
]);

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

Route::get('studyBack/{id}/{deckID}', [
	'middleware' => 'auth', 
	'uses' => 'StudyController@studyBack'
]);

Route::get('incorrect/{id}/{deckID}', [
	'middleware' => 'auth', 
	'uses' => 'StudyController@incorrect'
]);

Route::get('correct/{id}/{deckID}', [
	'middleware' => 'auth', 
	'uses' => 'StudyController@correct'
]);

// This route calls the cloneDeck function when users go to 
// the url cloneDeck/{id of deck}
Route::get('cloneDeck/{id}', [
	'middleware' => 'auth', 
	'uses' => 'BrowseController@cloneDeck'
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
