<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Status extends Model
{   
	protected $table = "statuses";

	protected $fillable = ['body', 'user_id', 'privacy', 'created_at', 'updated_at'];

	public function user()
	{
		return $this->belongsTo('App\User');
	}
	public function like()
	{
		return $this->hasMany('App\Like', 'status_id');
	}
	public function comment()
	{
		return $this->hasMany('App\Comment', 'status_id');
	}
	public function share()
	{
		return $this->hasMany('App\Share', 'status_id');
	}
	/*method*/
	public static function getStatusByUser($id)
	{
		$status = Status::where('user_id', $id)->orderBy('created_at','DESC')->paginate(10);
		return $status;
	}
	public static function timeAgo($ptime) /*this function return time post with each type of time*/
                            {
      
                                $etime = time() - strtotime($ptime);

                                if ($etime < 1)
                                {
                                    return 'Vừa xong';
                                }

                                $a = array( 365 * 24 * 60 * 60  =>  'năm',
                                             30 * 24 * 60 * 60  =>  'tháng',
                                                  24 * 60 * 60  =>  'ngày',
                                                       60 * 60  =>  'giờ',
                                                            60  =>  'phút',
                                                             1  =>  'giây'
                                            );
                                $a_plural = array( 'năm'   => 'năm',
                                                   'tháng'  => 'tháng',
                                                   'ngày'    => 'ngày',
                                                   'giờ'   => 'giờ',
                                                   'phút' => 'phút',
                                                   'giây' => 'giây'
                                            );

                                foreach ($a as $secs => $str)
                                {
                                    $d = $etime / $secs;
                                    if ($d >= 1)
                                    {
                                        $r = round($d);
                                        return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' trước';
                                    }
                                }
                            }
}
