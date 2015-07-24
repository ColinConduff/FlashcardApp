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
        $decks = Auth::user()->decks()->get();
        $notes = Auth::user()->notes()->get();
        $reviews = Auth::user()->reviews()->get();
        $posts = Auth::user()->posts()->get();
        $comments = Auth::user()->comments()->get();

        return view('dashboard', compact('user', 'decks', 'notes', 'reviews', 'posts', 'comments'));
    }
}
