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
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $decks = Auth::user()->decks()->get();

        return view('decks.showAll', compact('decks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('decks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\DeckRequest $request)
    {
        $deck = new Deck($request->all());

        Auth::user()->decks()->save($deck);

        return redirect('decks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $deck = Auth::user()->decks()->findOrFail($id);

        $flashcards = DB::table('flashcards')->where('deck_id', '=', $id)->get();

        $reviews = DB::table('reviews')->where('deck_id', '=', $id)->get();

        return view('decks.showOne', compact('deck', 'flashcards', 'reviews'));
    }

    /**
     * Show the form for editing the specified resource.
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
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
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
