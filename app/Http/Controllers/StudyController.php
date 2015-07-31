<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use App\Flashcard;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudyController extends Controller
{
    /*
        Provides a list of decks to the select form in the study view.
    */
    public function sendListOfDecks()
    {
        $decks = Auth::user()->decks()
            ->select('decks.id', 'decks.title')
            ->lists('title', 'id');

        return view('study', compact('decks'));
    }

    /*
        Gets the deck id's associated with the deck titles selected by the user
        and finds the first flashcard with the lowest ratio out of the selected decks.
    */
    public function studySelectedDecks(Request $request)
    {
        $deckID = $request->input('id');

        $flashcard = DB::table('flashcards')->where('deck_id', '=', $deckID)->orderBy('ratio_correct', 'asc')->first();

        return view('studyFront', compact('flashcard', 'deckID'));
    }

    /*
        Sends the data associated with the specific flashcard to the view studyBack.blade.php 
    */
    public function studyBack($id, $deckID)
    {
        $flashcard = Flashcard::findOrFail($id);

        return view('studyBack', compact('flashcard', 'deckID'));
    }

    /*
        Updates the flashcard's number of attempts, number correct, and the ratio.
    */
    public function correct($id, $deckID)
    {
        $flashcard = Flashcard::findOrFail($id);

        $flashcard->increment('number_of_attempts');
        $flashcard->increment('number_correct');
        $flashcard->update(
            ['ratio_correct' => ($flashcard->number_correct/$flashcard->number_of_attempts)]
        );

        $flashcard = DB::table('flashcards')->where('deck_id', '=', $deckID)->orderBy('ratio_correct', 'asc')->first();

        return view('studyFront', compact('flashcard', 'deckID'));
    }

    /*
        Updates the flashcard's number of attempts, number correct, and the ratio.
    */
    public function incorrect($id)
    {
        $flashcard = Flashcard::findOrFail($id);

        $flashcard->increment('number_of_attempts');
        $flashcard->update(
            ['ratio_correct' => ($flashcard->number_correct/$flashcard->number_of_attempts)]
        );

        $flashcard = DB::table('flashcards')->where('deck_id', '=', $deckID)->orderBy('ratio_correct', 'asc')->first();

        return view('studyFront', compact('flashcard', 'deckID'));
    }

}
