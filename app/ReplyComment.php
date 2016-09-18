<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class ReplyComment extends Model
{   
	protected $table = "reply_comments";

	protected $fillable = ['body', 'user_id', 'comment_id', 'created_at', 'updated_at'];

	public function user()
	{
		return $this->belongsTo('App\User');
	}
	public function replycommentlike()
	{
		return $this->hasMany('App\ReplyCommentLike', 'comment_id');
	}
	public function comment()
	{
		return $this->belongsTo('App\Comment');
	}
	public function set()
	{
		
	}
	public static function removeByComment($comment_id)
	{
		$reply_comments = ReplyComment::where('comment_id', $comment_id);
		$reply_comments->delete();
	}
}
