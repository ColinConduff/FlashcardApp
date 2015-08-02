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
        $posts= Post::where('title', 'like', $request->title.'%')->paginate(10);
        return view('forum', compact('posts'));
    }

    public function forumTitleDesc()
    {   $posts=  Post::with('user')
              ->orderBy('title', 'desc')
              ->paginate(10);

        return view('forum', compact('posts'));
    }

    public function forumTitleAsc()
    {
        $posts = Post::with('user')
            ->orderBy('title', 'asc')
            ->paginate(10);

        return view('forum', compact('posts'));
    }

    // public function forumUsernameAsc()
    // {
    //     $posts = Post::with('user')
    //         ->paginate(10)
    //         ->sortBy(function($posts) {
    //             return $posts->user->name;
    //         });

    //     return view('forum', compact('posts'));
    // }

    // public function forumUsernameDesc()
    // {
    //     $posts = Post::with('user')
    //         ->paginate(10)
    //         ->sortBy(function($posts) {
    //             return $posts->user->name;
    //         })->reverse();

    //     return view('forum', compact('posts'));
    // }

    public function forumTopicAsc()
    {
        $posts = Post::with('user')
            ->orderBy('topic', 'asc')
            ->paginate(10);

        return view('forum', compact('posts'));
    }

    public function forumTopicDesc()
    {
        $posts = Post::with('user')
            ->orderBy('topic', 'desc')
            ->paginate(10);

        return view('forum', compact('posts'));
    }

    public function forumPublishDateAsc()
    {
        $posts = Post::with('user')
            ->orderBy('published_at', 'asc')
            ->paginate(10);

        return view('forum', compact('posts'));
    }

    public function forumPublishDateDesc()
    {
        $posts = Post::with('user')
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        return view('forum', compact('posts'));
    }

    public function forumScoreAsc()
    {
         $posts = Post::with('user')
            ->orderBy('score', 'asc')
            ->paginate(10);

    return view('forum', compact('posts'));
    }

    public function forumScoreDesc()
    {
        $posts = Post::with('user')
            ->orderBy('score', 'desc')
            ->paginate(10);

        return view('forum', compact('posts'));
    }

    public function showProtectedPost($id)
    {
        $post = Post::with(['comments' => function ($query) {
                $query->orderBy('published_at', 'asc');
            }])->findOrFail($id);

        return view('posts.protectedShowOne' ,compact('post'));
    }
}
