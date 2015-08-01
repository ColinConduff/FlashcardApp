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
     * Prevents access by non-logged in users.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the note.
     *
     * @return Response
     */
    public function index()
    {
        $notes = Auth::user()->notes()->with('flashcard')->orderBy('published_at', 'desc')->paginate(5);
    
        return view('notes.showAll', compact('notes'));
    }

    /**
     * Store a newly created note in storage.
     *
     * @return Response
     */
    public function store(Requests\NoteRequest $request)
    {
        $note = new Note($request->all());
        $note['flashcard_id'] = $request->flashcard_id;
        $note['published_at'] = Carbon::now();

        Auth::user()->notes()->save($note);

        return redirect()->action('BrowseController@showProtectedFlashcard', ['id' => $note->flashcard_id]);
    }

    /**
     * Display the specified note.
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
     * Show the form for editing the specified note.
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
     * Update the specified note in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Requests\NoteRequest $request)
    {
        $note = Note::findOrFail($id);
        $note['published_at'] = Carbon::now();

        $note->update($request->all());

        return redirect()->action('NoteController@index');
    }

    /**
     * Remove the specified note from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();

        return redirect()->action('NoteController@index');
    }

    public function upvote($id)
    {
        $note = Note::findOrFail($id);
        $note->increment('score');

        return redirect()->action('BrowseController@showProtectedFlashcard', [$note->flashcard_id]);
    }
}
