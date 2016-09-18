<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReplyCommentLike extends Model
{
	protected $table    = "reply_comment_likes";
	
	protected $fillable = ['user_id', 'comment_id', 'created_at', 'updated_at'];

	public function user()
	{
		return $this->belongsTo('App\User');
	}
	public function replyComment()
	{
		return $this->belongsTo('App\ReplyComment');
	}
}
