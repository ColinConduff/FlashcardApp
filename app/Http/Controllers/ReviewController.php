<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Carbon\Carbon;
use App\Review;
use App\Deck;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    /**
     * Prevents access by non-logged in users.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the review.
     *
     * @return Response
     */
    public function index()
    {
        $reviews = Auth::user()->reviews()->get();

        return view('reviews.showAll', compact('reviews'));
    }

    /**
     * Store a newly created review in storage and update deck average rating.
     *
     * @return Response
     */
    public function store(Requests\ReviewRequest $request)
    {
        $review = new Review($request->all());
        $review['published_at'] = Carbon::now();

        Auth::user()->reviews()->save($review);

        $deck = Deck::findOrFail($request->deck_id);
        $deck->average_rating = Review::where('deck_id', '=', $request->deck_id)->avg('rating');
        $deck->update();

        return redirect()->action('BrowseController@showProtectedDeck', ['id' => $review->deck_id]);
    }

    /**
     * Display the specified review.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $review = Review::findOrFail($id);

        return view('reviews.showOne', compact('review'));
    }

    /**
     * Show the form for editing the specified review.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $review = Review::findOrFail($id);

        return view('reviews.edit', compact('review'));
    }

    /**
     * Update the specified review in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Requests\ReviewRequest $request)
    {
        $review = Review::findOrFail($id);
        $review['published_at'] = Carbon::now();

        $review->update($request->all());

        $deck = Deck::findOrFail($request->deck_id);
        $deck->average_rating = Review::where('deck_id', '=', $request->deck_id)->avg('rating');
        $deck->update();

        return redirect()->action('DeckController@showProtectedDeck', [$review->deck_id]);
    }

    /**
     * Remove the specified review from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->action('DeckController@show', [$review->deck_id]);
    }
}
