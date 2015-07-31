<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;
use App\Flashcard;
use App\Deck;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FlashcardController extends Controller
{
    /**
     * Prevents access by non-logged in users.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created flashcard in storage.
     *
     * @return Response
     */
    public function store(Requests\FlashcardRequest $request)
    {
        $flashcard = new Flashcard($request->all());
        $flashcard['deck_id'] = $request->deck_id;

        $flashcard->save();

        return redirect() ->  action('DeckController@show', ['id' => $flashcard->deck_id]);
    }

    /**
     * Display the specified flashcard.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $flashcard = Flashcard::findOrFail($id);

        $notes = DB::table('notes')->where('flashcard_id', '=', $id)->paginate(5);

        return view('flashcards.showOne', compact('flashcard', 'notes'));
    }

    /**
     * Show the form for editing the specified flashcard.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $flashcard = Flashcard::findOrFail($id);

        return view('flashcards.edit', compact('flashcard'));
    }

    /**
     * Update the specified flashcard in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Requests\FlashcardRequest $request)
    {
        $flashcard = Flashcard::findOrFail($id);

        $flashcard->update($request->all());

        return redirect()->action('DeckController@show', [$flashcard->deck_id]);
    }

    /**
     * Remove the specified flashcard from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $flashcard = Flashcard::findOrFail($id);
        $flashcard->delete();

        return redirect()->action('DeckController@show', [$flashcard->deck_id]);
    }
}
