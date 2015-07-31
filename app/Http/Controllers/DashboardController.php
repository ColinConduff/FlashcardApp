<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /*
        Displays all of the data related to the user.  
    */
    public function displayDashboard() 
    {
        $user = Auth::user();
        $decks = Auth::user()->decks()->orderBy('updated_at', 'desc')->paginate(5);
        $notes = Auth::user()->notes()->orderBy('updated_at', 'desc')->paginate(5);
        $reviews = Auth::user()->reviews()->orderBy('updated_at', 'desc')->paginate(5);
        $posts = Auth::user()->posts()->orderBy('updated_at', 'desc')->paginate(5);
        $comments = Auth::user()->comments()->orderBy('updated_at', 'desc')->paginate(5);

        return view('dashboard', compact('user', 'decks', 'notes', 'reviews', 'posts', 'comments'));
    }
}
