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
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // $flashcards = DB::table('flashcards')->where('deck_id', '=', $id)->get();

        // return view('flashcards.showAll', compact('flashcards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    // public function create()
    // {
    //     return view('decks.create');
    // }

    /**
     * Store a newly created resource in storage.
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $flashcard = Flashcard::findOrFail($id);

        return view('flashcards.showOne', compact('flashcard'));
    }

    /**
     * Show the form for editing the specified resource.
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
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
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
