<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use App\User;
use App\Deck;
use App\Review;
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
    	$decks = Deck::where('title', 'like', $request->title.'%')->paginate(10);
    	
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
    		->paginate(10);

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
    		->paginate(10);

    	return view('browse', compact('decks'));
	}
	
    /*
        Returns all public decks, ordered by username in ascending order
    */
	// public function browseByUsernameAsc()
	// {
	// 	$decks = Deck::with('user', 'flashcards')
 //    		->where('private', '=', 0)
 //    		->paginate(10)
 //    		->sortBy(function($deck) {
 //    			return $deck->user->name;
 //    		});

 //    	return view('browse', compact('decks'));
	// }

    
 //        Returns all public decks, ordered by username in descending order
    
	// public function browseByUsernameDesc()
	// {
	// 	$decks = Deck::with('user', 'flashcards')
 //    		->where('private', '=', 0)
 //    		->paginate(10)
 //    		->sortBy(function($deck) {
 //    			return $deck->user->name;
 //    		})->reverse();

 //    	return view('browse', compact('decks'));
	// }

    /*
        Returns all public decks, ordered by rating in ascending order
    */
	public function browseByRatingAsc()
	{
		$decks = Deck::with('user', 'flashcards')
    		->where('private', '=', 0)
    		->orderBy('average_rating', 'asc')
    		->paginate(10);

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
    		->paginate(10);

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
    		->paginate(10);

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
    		->paginate(10);

    	return view('browse', compact('decks'));
	}

    /*
        Returns all public decks, ordered by number of flashcards in ascending order
    */
	// public function browseByFlashAsc()
	// {
	// 	$decks = Deck::with('user', 'flashcards')
 //    		->where('private', '=', 0)
 //    		->get()
 //    		->sortBy(function($deck) {
 //    			return $deck->flashcards->count();
 //    		});

 //    	return view('browse', compact('decks'));
	// }

    
 //        Returns all public decks, ordered by number of flashcards in descending order 
    
	// public function browseByFlashDesc()
	// {
	// 	$decks = Deck::with('user', 'flashcards')
 //    		->where('private', '=', 0)
 //    		->get()
 //    		->sortBy(function($deck) {
 //    			return $deck->flashcards->count();
 //    		})->reverse();

 //    	return view('browse', compact('decks'));
	// }

    /*
        Shows one deck at a time without edit and delete functionality 
    */
    public function showProtectedDeck($id)
    {
        $deck = Deck::findOrFail($id);

        $flashcards = DB::table('flashcards')->where('deck_id', '=', $id)->paginate(10);

        $reviews = DB::table('reviews')->where('deck_id', '=', $id)->paginate(10);

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
        Shows one flashcard at a time without edit and delete functionality 
    */
    public function showProtectedReview($id)
    {
        $review = Review::with('deck', 'user')->findOrFail($id);

        return view('reviews.protectedShowOne', compact('review'));
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
        $clonedDeck['average_rating'] = 0;
        $clonedDeck['title'] = $originalDeck->title;
        $clonedDeck['subject'] = $originalDeck->subject;
        $clonedDeck['private'] = 1;
        Auth::user()->decks()->save($clonedDeck);

        $originalFlashcards = Flashcard::where('deck_id', '=', $originalDeck->id)->get();
        
        foreach($originalFlashcards as $origFlashcard)
        {
            $cloneFlashcard = new Flashcard;
            $cloneFlashcard['front'] = $origFlashcard->front;
            $cloneFlashcard['back'] = $origFlashcard->back;
            $cloneFlashcard['number_of_attempts'] = 0;
            $cloneFlashcard['number_correct'] = 0;
            $cloneFlashcard['ratio_correct'] = 0;
            $cloneFlashcard['deck_id'] = $clonedDeck->id;
            $cloneFlashcard->save();
        }

        return redirect('decks');
    }
}
