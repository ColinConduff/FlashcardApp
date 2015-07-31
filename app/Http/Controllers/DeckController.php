<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use App\Deck;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DeckController extends Controller
{
    /**
     * Prevents access by non-logged in users.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Shows all decks associated with the logged in user.
     *
     * @return Response
     */
    public function index()
    {
        $decks = Auth::user()->decks()->paginate(5);

        return view('decks.showAll', compact('decks'));
    }

    /**
     * Show the form for creating a new deck.
     *
     * @return Response
     */
    public function create()
    {
        return view('decks.create');
    }

    /**
     * Store a newly created deck in storage.
     *
     * @return Response
     */
    public function store(Requests\DeckRequest $request)
    {
        $deck = new Deck($request->all());
        $deck['average_rating'] = 0;

        Auth::user()->decks()->save($deck);

        return redirect('decks');
    }

    /**
     * Display the specified deck.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $deck = Auth::user()->decks()->findOrFail($id);

        $flashcards = DB::table('flashcards')->where('deck_id', '=', $id)->paginate(5);

        $reviews = DB::table('reviews')->where('deck_id', '=', $id)->paginate(5);

        return view('decks.showOne', compact('deck', 'flashcards', 'reviews'));
    }

    /**
     * Show the form for editing the specified deck.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $deck = Auth::user()->decks()->findOrFail($id);

        return view('decks.edit', compact('deck'));
    }

    /**
     * Update the specified deck in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Requests\DeckRequest $request)
    {
        $deck = Auth::user()->decks()->findOrFail($id);

        $deck->update($request->all());

        return redirect('decks');
    }

    /**
     * Remove the specified deck from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $deck = Auth::user()->decks()->findOrFail($id);
        $deck->delete();

        return redirect('decks');
    }
}
