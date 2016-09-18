<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folow extends Model
{
    protected $table = "folows";

	protected $fillable = ['requester_id', 'folower_id', 'created_at', 'updated_at'];

	public function user()
	{
		return $this->belongsToMany('App\User');
	}
}
