<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Carbon\Carbon;
use App\Review;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $reviews = Auth::user()->reviews()->get();

        return view('reviews.showAll', compact('reviews'));
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
    public function store(Requests\ReviewRequest $request)
    {
        $review = new Review($request->all());
        $review['deck_id'] = $request->deck_id;
        $review['published_at'] = Carbon::now();

        Auth::user()->reviews()->save($review);

        return redirect() ->  action('DeckController@show', ['id' => $review->deck_id]);
    }

    /**
     * Display the specified resource.
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
     * Show the form for editing the specified resource.
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
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Requests\ReviewRequest $request)
    {
        $review = Review::findOrFail($id);
        $review['published_at'] = Carbon::now();

        $review->update($request->all());

        return redirect()->action('DeckController@show', [$review->deck_id]);
    }

    /**
     * Remove the specified resource from storage.
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
