<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\ReplyComment;

class Comment extends Model
{   
	protected $table = "comments";

	protected $fillable = ['body', 'user_id', 'status_id', 'created_at', 'updated_at'];

	public function user()
	{
		return $this->belongsTo('App\User'); // NOT { return $this->belongsTo('App\User', 'id'); }
	}
	public function status()
	{
		return $this->belongsTo('App\Status');
	}
	public function replyComment()
	{
		return $this->hasMany('App\ReplyComment');
	}
	public function commentlike()
	{
		return $this->hasMany('App\CommentLike');
	}
	public function deleteCommentByStatus($status_id)
	{
		$comments = Comment::where('status_id',$status_id);
		$comments->delete();
	}
	public static function set($user_id, $status_id, $body) /*remember to static function for call this function in outside*/
	{
		    $comment            = new Comment();
            $comment->body      = $body;
            $comment->user_id   = $user_id;
            $comment->status_id = $status_id;
            $comment->save();
	}
	public static function remove($comment_id)
	{
		ReplyComment::removeByComment($comment_id);

		$comment = Comment::where('id', $comment_id);
		$comment->delete();
	}
}
