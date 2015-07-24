<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
	/*
    	This defines the Deck model and defines 
    	its relationships with other models.
    */
    protected $fillable = [
		'average_rating',
	    'title',
	    'subject',
		'private',
        'user_id',
	];

    public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function reviews()
	{
		return $this->hasMany('App\Review');
	}

	public function permissions()
	{
		return $this->hasMany('App\Permission');
	}

	public function flashcards()
	{
		return $this->hasMany('App\Flashcard');
	}
}
