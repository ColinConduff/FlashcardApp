<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use Auth;
use App\Note;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\NoteRequest $request)
    {
        $note = new Note($request->all());
        $note['flashcard_id'] = $request->flashcard_id;
        $note['published_at'] = Carbon::now();

        Auth::user()->notes()->save($note);

        return redirect() ->  action('FlashcardController@show', ['id' => $note->flashcard_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $note = Note::findOrFail($id);

        return view('notes.showOne', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $note = Note::findOrFail($id);

        return view('notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Requests\NoteRequest $request)
    {
        $note = Note::findOrFail($id);
        $note['published_at'] = Carbon::now();

        $note->update($request->all());

        return redirect()->action('FlashcardController@show', [$note->flashcard_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();

        return redirect()->action('FlashcardController@show', [$note->flashcard_id]);
    }
}
