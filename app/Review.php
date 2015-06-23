<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
		'rating',
		'title',
		'body',
		'user_id',
        'deck_id',
        'published_at',
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
