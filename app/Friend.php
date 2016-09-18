<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $table = "friends";

	protected $fillable = ['is', 'requester_id', 'requested_id', 'created_at', 'updated_at'];

	public function user()
	{
		$this->belongsToMany('App\user');
	}
}
