<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Deck;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BrowseController extends Controller
{
	public function browseSearchBar(Request $request) 
    {
    	$decks = Deck::where('title', 'like', $request->title.'%')->get();
    	
		return view('browse', compact('decks'));
    }

    public function browseByTitleDesc() 
    {
    	$decks = Deck::with('user', 'flashcards')
    		->where('private', '=', 0)
    		->orderBy('title', 'desc')
    		->get();

    	return view('browse', compact('decks'));
    }

    public function browseByTitleAsc()
	{
		$decks = Deck::with('user', 'flashcards')
    		->where('private', '=', 0)
    		->orderBy('title', 'asc')
    		->get();

    	return view('browse', compact('decks'));
	}
	
	public function browseByUsernameAsc()
	{
		$decks = Deck::with('user', 'flashcards')
    		->where('private', '=', 0)
    		->get()
    		->sortBy(function($deck) {
    			return $deck->user->name;
    		});

    	return view('browse', compact('decks'));
	}
	public function browseByUsernameDesc()
	{
		$decks = Deck::with('user', 'flashcards')
    		->where('private', '=', 0)
    		->get()
    		->sortBy(function($deck) {
    			return $deck->user->name;
    		})->reverse();

    	return view('browse', compact('decks'));
	}

	public function browseByRatingAsc()
	{
		$decks = Deck::with('user', 'flashcards')
    		->where('private', '=', 0)
    		->orderBy('average_rating', 'asc')
    		->get();

    	return view('browse', compact('decks'));
	}
	public function browseByRatingDesc()
	{
		$decks = Deck::with('user', 'flashcards')
    		->where('private', '=', 0)
    		->orderBy('average_rating', 'desc')
    		->get();

    	return view('browse', compact('decks'));
	}
	public function browseBySubjectAsc()
	{
		$decks = Deck::with('user', 'flashcards')
    		->where('private', '=', 0)
    		->orderBy('subject', 'asc')
    		->get();

    	return view('browse', compact('decks'));
	}
	public function browseBySubjectDesc()
	{
		$decks = Deck::with('user', 'flashcards')
    		->where('private', '=', 0)
    		->orderBy('subject', 'desc')
    		->get();

    	return view('browse', compact('decks'));
	}
	public function browseByFlashAsc()
	{
		$decks = Deck::with('user', 'flashcards')
    		->where('private', '=', 0)
    		->get()
    		->sortBy(function($deck) {
    			return $deck->flashcards->count();
    		});

    	return view('browse', compact('decks'));
	}
	public function browseByFlashDesc()
	{
		$decks = Deck::with('user', 'flashcards')
    		->where('private', '=', 0)
    		->get()
    		->sortBy(function($deck) {
    			return $deck->flashcards->count();
    		})->reverse();

    	return view('browse', compact('decks'));
	}
}
