<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentLike extends Model
{
	protected $table = "comment_likes";

	protected $fillable = ['user_id', 'comment_id', 'created_at', 'updated_at'];
	
    public function comment()
    {
    	return $this->belongsTo('App\Comment');
    }
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public static function set($comment_id, $user_id)
    {
        $like             = new CommentLike;
        $like->comment_id = $comment_id;
        $like->user_id    = $user_id;
        $like->save();
    }

    public static function remove($comment_id, $user_id)
    {
        $unlike = CommentLike::where('comment_id',$comment_id)->where('user_id', $user_id);
        $unlike->delete();
    }    
}
