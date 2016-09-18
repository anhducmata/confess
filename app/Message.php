<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = "messages";

	protected $fillable = ['body', 'sender_id', 'receiver_id', 'status' ,'created_at', 'updated_at'];

	public function user()
	{
		return $this->belongsToMany('App\User');
	}
}
