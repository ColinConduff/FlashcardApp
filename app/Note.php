<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'user_id',
        'flashcard_id',
        'score',
        'body',
        'published_at',
	];

    public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function flashcard()
	{
		return $this->belongsTo('App\Flashcard');
	}
}
