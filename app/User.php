<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected  $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','sex','birthday','online_status','chat_status','email', 'password', 'cover',  'avatar'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /*User has many Status*/
    public function status()
    {
    return $this->hasMany('App\Status', 'user_id'); 
    }
    /*User has many Comment*/
    public function comment()
    {
    return $this->hasMany('App\Comment', 'user_id');
    }
    /*User has many reply Comment*/
    public function replyComment()
    {
    return $this->hasMany('App\ReplyComment','user_id');
    }
    /*User has many like*/
    public function like()
    {
    return $this->hasMany('App\Like','user_id');
    }   
    /*User has many share*/
    public function share()
    {
    return $this->hasMany('App\Share','user_id');
    }
    /*User has many reply comment like*/
    public function replyCommentLike()
    {
    return $this->hasMany('App\ReplyCommentLike','user_id');
    }
    /*User has many Message*/
    public function message()
    {
    return $this->belongsToMany('App\Message','sender_id', 'receiver_id');
    }
    /*User belongsTo Friend*/
    public function friend()
    {
    return $this->belongsToMany('App\Friend','requester_id', 'requested_id');
    }
    public function folow()
    {
    return $this->belongsToMany('App\Folow','requester_id', 'folower_id');
    }
    /*Method*/
    public static function getUser($id)
    {
        $user = User::find($id);
        return $user;
    }
}
