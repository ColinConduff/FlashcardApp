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
     * Prevents access by non-logged in users.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Shows all comments associated with the logged in user.
     *
     * @return Response
     */
    public function index()
    {
        $comments = Auth::user()->comments()->get();
    
        return view('comments.showAll', compact('comments'));
    }

    /**
     * Store a newly created comment in storage.
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
     * Displays one comment.
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
     * Show the form for editing the comment.
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
     * Update the comment in storage.
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
     * Remove the comment from storage.
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
