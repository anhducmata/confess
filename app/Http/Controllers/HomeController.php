<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use DB;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Input;
use Response;
use App\User;
use App\Comment;
use App\Status;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      $statuses = Status::where('privacy', 1)->orWhere('user_id',Auth::user()->id)->orderBy('created_at','DESC')->paginate(15);
      $user     = new User;
      return view('home', [
        'statuses' => $statuses,
        'user'     => $user
        ]);
    }
    public function postDelete()
    {
              if(Request::ajax()){
            $status_id = Input::get('status_id');
            $status    =  Status::find($status_id);
            $status->delete();

            $comment   = Comment::where('status_id', $status_id);
            $comment->delete();


            $response = array(
                // 'user_id' => $user_id,
                // 'body' => $body,
                // 'privacy' => $privacy,
                'status' => 'success',
                'msg'    => 'successfully',
            );
            return Response::json($response); 
        }else{
            return 'no';
        }
    }
    public function postPrivacyChange()
    {
              if(Request::ajax()){
            $privacy         = Input::get('key');
            $status_id       = Input::get('status_id');
            
            $status          =  Status::find($status_id);
            $status->privacy = $privacy;
            $status->save();


            $response = array(
                // 'user_id' => $user_id,
                // 'body' => $body,
                // 'privacy' => $privacy,
                'status' => 'success',
                'msg'    => 'successfully',
            );
            return Response::json($response); 
        }else{
            return 'no';
        }
    }
    
    public function postStatus()
    {
        if(Request::ajax()){
            $user_id         = Input::get( 'user_id' );
            $body            = Input::get( 'body' );
            $privacy         = Input::get('privacy');
            
            $status          = new Status();
            $status->user_id = $user_id;
            $status->body    = $body;
            $status->privacy = $privacy;
            $status->save();


            $response = array(
                // 'user_id' => $user_id,
                // 'body' => $body,
                // 'status_id' => $status->id,
                'status' => 'success',
                'msg'    => 'status created successfully',
            );
            return Response::json($response); 
        }else{
            return 'no';
        }
    }


}
