<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use App\User;
use App\Deck;
use App\Flashcard;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BrowseController extends Controller
{
    /*
        Returns decks with titles similar to the user input.
    */
	public function browseSearchBar(Request $request) 
    {
    	$decks = Deck::where('title', 'like', $request->title.'%')->get();
    	
		return view('browse', compact('decks'));
    }

    /*
        Returns all public decks in descending order
    */
    public function browseByTitleDesc() 
    {
    	$decks = Deck::with('user', 'flashcards')
    		->where('private', '=', 0)
    		->orderBy('title', 'desc')
    		->get();

    	return view('browse', compact('decks'));
    }

    /*
        Returns all public decks in ascending order
    */
    public function browseByTitleAsc()
	{
		$decks = Deck::with('user', 'flashcards')
    		->where('private', '=', 0)
    		->orderBy('title', 'asc')
    		->get();

    	return view('browse', compact('decks'));
	}
	
    /*
        Returns all public decks, ordered by username in ascending order
    */
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

    /*
        Returns all public decks, ordered by username in descending order
    */
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

    /*
        Returns all public decks, ordered by rating in ascending order
    */
	public function browseByRatingAsc()
	{
		$decks = Deck::with('user', 'flashcards')
    		->where('private', '=', 0)
    		->orderBy('average_rating', 'asc')
    		->get();

    	return view('browse', compact('decks'));
	}

    /*
        Returns all public decks, ordered by rating in descending order
    */
	public function browseByRatingDesc()
	{
		$decks = Deck::with('user', 'flashcards')
    		->where('private', '=', 0)
    		->orderBy('average_rating', 'desc')
    		->get();

    	return view('browse', compact('decks'));
	}

    /*
        Returns all public decks, ordered by subject in ascending order
    */
	public function browseBySubjectAsc()
	{
		$decks = Deck::with('user', 'flashcards')
    		->where('private', '=', 0)
    		->orderBy('subject', 'asc')
    		->get();

    	return view('browse', compact('decks'));
	}

    /*
        Returns all public decks, ordered by subject in descending order
    */
	public function browseBySubjectDesc()
	{
		$decks = Deck::with('user', 'flashcards')
    		->where('private', '=', 0)
    		->orderBy('subject', 'desc')
    		->get();

    	return view('browse', compact('decks'));
	}

    /*
        Returns all public decks, ordered by number of flashcards in ascending order
    */
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

    /*
        Returns all public decks, ordered by number of flashcards in descending order 
    */
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

    /*
        Shows one deck at a time without edit and delete functionality 
    */
    public function showProtectedDeck($id)
    {
        $deck = Deck::findOrFail($id);

        $flashcards = DB::table('flashcards')->where('deck_id', '=', $id)->get();

        $reviews = DB::table('reviews')->where('deck_id', '=', $id)->get();

        return view('decks.protectedShowOne', compact('deck', 'flashcards', 'reviews'));
    }

    /*
        Shows one flashcard at a time without edit and delete functionality 
    */
    public function showProtectedFlashcard($id)
    {
        $flashcard = Flashcard::with('notes')->findOrFail($id);

        return view('flashcards.protectedShowOne', compact('flashcard'));
    }

    /* 
        The parameter is a deck id.  
        The function creates a new deck with the original 
        deck's information and flashcards, 
        except with a new user_id = current user
    */
    public function cloneDeck($id)
    {
        $originalDeck = Deck::findOrFail($id);

        $clonedDeck = new Deck;
        $clonedDeck['average_rating'] = $originalDeck->average_rating;
        $clonedDeck['title'] = $originalDeck->title;
        $clonedDeck['subject'] = $originalDeck->subject;
        $clonedDeck['private'] = $originalDeck->private;
        Auth::user()->decks()->save($clonedDeck);

        $originalFlashcards = Flashcard::where('deck_id', '=', $originalDeck->id)->get();
        
        foreach($originalFlashcards as $origFlashcard)
        {
            $cloneFlashcard = new Flashcard;
            $cloneFlashcard['front'] = $origFlashcard->front;
            $cloneFlashcard['back'] = $origFlashcard->back;
            $cloneFlashcard['number_of_attempts'] = $origFlashcard->number_of_attempts;
            $cloneFlashcard['number_correct'] = $origFlashcard->number_correct;
            $cloneFlashcard['ratio_correct'] = $origFlashcard->ratio_correct;
            $cloneFlashcard['deck_id'] = $clonedDeck->id;
            $cloneFlashcard->save();
        }

        return redirect('decks');
    }
}
