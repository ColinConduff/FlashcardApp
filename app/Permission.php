<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
	/*
    	This defines the Permission model and defines 
    	its relationships with other models.
    */
    protected $fillable = [
        'user_id',
        'deck_id',
        'title',
	];

    public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function deck()
	{
		return $this->belongsTo('App\Deck');
	}
}
