<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /*
        This defines the Post model and defines 
        its relationships with other models.
    */
    protected $fillable = [
        'user_id',
        'title',
        'body',
        'topic',
        'score',
        'published_at',
	];

    public function user()
	{
		return $this->belongsTo('App\User');
	}

	 public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
