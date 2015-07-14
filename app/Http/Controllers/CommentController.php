<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use Auth;
use App\Comment;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $comments = Auth::user()->comments()->get();
    
        return view('comments.showAll', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\CommentRequest $request)
    {
        $comment = new Comment($request->all());
        $comment['post_id'] = $request->post_id;
        $comment['published_at'] = Carbon::now();

        Auth::user()->comments()->save($comment);

        return redirect()-> action('PostController@show', ['id' => $comment->post_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $comment = Comment::findOrFail($id);

        return view('comments.showOne', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Requests\CommentRequest $request)
    {
        $comment = Comment::findOrFail($id);
        $comment['published_at'] = Carbon::now();

        $comment->update($request->all());

        return redirect()->action('PostController@show', [$comment->post_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->action('PostController@show', [$comment->post_id]);
    }
}
