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
    public function sendListOfDecks()
    {
        $decks = Auth::user()->decks()
            ->select('decks.id', 'decks.title')
            ->lists('title', 'id');

        return view('study', compact('decks'));
    }

    public function studySelectedDecks(Request $request)
    {
        $deckIDs = $request->input('id');

        $flashcard = DB::table('flashcards')->whereIn('deck_id', $deckIDs)->orderBy('ratio_correct', 'asc')->first();

        $decks = Auth::user()->decks()
            ->select('decks.id', 'decks.title')
            ->lists('title', 'id');

        return view('studyFront', compact('flashcard', 'decks'));
    }

    public function studyBack($id)
    {
        $flashcard = Flashcard::findOrFail($id);

        $decks = Auth::user()->decks()
            ->select('decks.id', 'decks.title')
            ->lists('title', 'id');

        return view('studyBack', compact('flashcard', 'decks'));
    }

    public function correct($id)
    {
        $flashcard = Flashcard::findOrFail($id);

        $flashcard->increment('number_of_attempts');
        $flashcard->increment('number_correct');
        $flashcard->update(
            ['ratio_correct' => ($flashcard->number_correct/$flashcard->number_of_attempts)]
        );

        return redirect()->action('StudyController@sendListOfDecks');
    }

    public function incorrect($id)
    {
        $flashcard = Flashcard::findOrFail($id);

        $flashcard->increment('number_of_attempts');
        $flashcard->update(
            ['ratio_correct' => ($flashcard->number_correct/$flashcard->number_of_attempts)]
        );

        return redirect()->action('StudyController@sendListOfDecks');
    }

}
