<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /*
    	This defines the Comment model and defines 
    	its relationships with other models.
    */
    protected $fillable = [
		'user_id',
        'post_id',
        'score',
        'body',
        'published_at',
	];

    public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function post()
	{
		return $this->belongsTo('App\Post');
	}
}
