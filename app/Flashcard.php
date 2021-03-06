<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flashcard extends Model
{
	/*
    	This defines the Flashcard model and defines 
    	its relationships with other models.
    */
    protected $fillable = [
		'front',
		'back',
		'number_of_attempts',
        'number_correct',
        'ratio_correct',
        'deck_id',
	];

    public function deck()
	{
		return $this->belongsTo('App\Deck');
	}

	public function notes()
	{
		return $this->hasMany('App\Note');
	}
}
