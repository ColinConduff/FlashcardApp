<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ForumController extends Controller
{
    public function forumSearchBar(Request $request)
    {   
        $posts= Post::where('title', 'like', $request->title.'%')->get();
        return view('forum', compact('posts'));
    }

    public function forumTitleDesc()
    {   $posts=  Post::with('user')
              ->orderBy('title', 'desc')
              ->get();

        return view('forum', compact('posts'));
    }

    public function forumTitleAsc()
    {
        $posts = Post::with('user')
            ->orderBy('title', 'asc')
            ->get();

        return view('forum', compact('posts'));
    }

    public function forumUsernameAsc()
    {
        $posts = Post::with('user')
            ->get()
            ->sortBy(function($posts) {
                return $posts->user->name;
            });

        return view('forum', compact('posts'));
    }

    public function forumUsernameDesc()
    {
        $posts = Post::with('user')
            ->get()
            ->sortBy(function($posts) {
                return $posts->user->name;
            })->reverse();

        return view('forum', compact('posts'));
    }

    public function forumTopicAsc()
    {
        $posts = Post::with('user')
            ->orderBy('topic', 'asc')
            ->get();

        return view('forum', compact('posts'));
    }

    public function forumTopicDesc()
    {
        $posts = Post::with('user')
            ->orderBy('topic', 'desc')
            ->get();

        return view('forum', compact('posts'));
    }

    public function forumPublishDateAsc()
    {
        $posts = Post::with('user')
            ->orderBy('published_at', 'asc')
            ->get();

        return view('forum', compact('posts'));
    }

    public function forumPublishDateDesc()
    {
        $posts = Post::with('user')
            ->orderBy('published_at', 'desc')
            ->get();

        return view('forum', compact('posts'));
    }

    public function forumScoreAsc()
    {
         $posts = Post::with('user')
            ->orderBy('score', 'asc')
            ->get();

    return view('forum', compact('posts'));
    }

    public function forumScoreDesc()
    {
        $posts = Post::with('user')
            ->orderBy('score', 'desc')
            ->get();

        return view('forum', compact('posts'));
    }

    public function showProtectedPost($id)
    {
        $post = Post::with('comments')->findOrFail($id);

        return view('posts.protectedShowOne' ,compact('post'));
    }
}
