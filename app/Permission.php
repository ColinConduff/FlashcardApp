<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
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
