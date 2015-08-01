<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use DB;
use Auth;
use App\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Prevents access by non-logged in users.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the post.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Auth::user()->posts()->orderBy('published_at', 'desc')->paginate(5);

        return view('posts.showAll', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     *
     * @return Response
     */
    public function create()
    {
         return view('posts.create');
    }

    /**
     * Store a newly created post in storage.
     *
     * @return Response
     */
    public function store(Requests\PostRequest $request)
    {
        $post = new Post($request->all());
        $post['published_at'] = Carbon::now();

        Auth::user()->posts()->save($post);

        return redirect('posts');
    }

    /**
     * Display the specified post.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $post = Auth::user()->posts()->findOrFail($id);

        $comments = DB::table('comments')->where('post_id', '=', $id)->paginate(5);

        return view('posts.showOne', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $post = Auth::user()->posts()->findOrFail($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified post in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Requests\PostRequest $request)
    {
        $post = Auth::user()->posts()->findOrFail($id);
        $post['published_at'] = Carbon::now();
        $post->update($request->all());

        return redirect('posts');
    }

    /**
     * Remove the specified post from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $post = Auth::user()->posts()->findOrFail($id);
        $post->delete();

        return redirect('posts');
    }

    public function upvote($id)
    {
        $post = Post::findOrFail($id);
        $post->increment('score');

        return redirect()->action('ForumController@showProtectedPost', [$post->id]);
    }
}
