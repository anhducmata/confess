<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = "likeds";

	protected $fillable = ['user_id', 'status_id', 'created_at', 'updated_at'];

	public function user()
	{
		return $this->belongsTo('App\User');
	}
	public function status()
	{
		return $this->belongsTo('App\Status');
	}
	public static function like($status_id, $user_id)
	{
		$like = Like::where('status_id', $status_id)->where('user_id', $user_id);
		if ($like->count() == 0) {
			$newlike         = new Like;
			$newlike->status_id = $status_id;			
			$newlike->user_id   = $user_id;
			$newlike->save();
			return 1;
		}else{
			$like->delete();
			return 0;
		}
		
	}
}
