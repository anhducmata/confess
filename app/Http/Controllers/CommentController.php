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
use App\CommentLike;
use Auth;


class CommentController extends Controller
{
    public function create()
    {
        if (Request::ajax()) {
            $user_id            = Input::get('user_id');
            $body               = Input::get('body');
            $status_id          = Input::get('status_id');
            
            $comment_id = Comment::set($user_id,$status_id,$body);

            $response = array(
                'comment_id' => $comment_id,
                'status'     => 'success',
                'msg'        => 'add comment successfully'
                );
            return Response::json($response);
        }else{
            return 'no';
        }
    }
    public function delete()
    {
        if (Request::ajax()) {
            $comment_id = Input::get('comment_id');
            
            Comment::remove($comment_id);

            $response = array(
                'status' => 'success',
                'msg' => 'add comment successfully'
                );
            return Response::json($response);
        }else{
            return 'no';
        }            
    }
    public function like()
    {
        if (Request::ajax()) {
            $comment_id = Input::get('comment_id');
            $user_id = Input::get('user_id');
            
            CommentLike::set($comment_id, $user_id);

            $response = array(
                'status' => 'success',
                'msg' => 'add comment successfully'
                );
            return Response::json($response);
        }else{
            return 'no';
        }           
    }    
    public function unlike()
    {
        if (Request::ajax()) {
            $comment_id = Input::get('comment_id');
            $user_id = Input::get('user_id');
            
            CommentLike::remove($comment_id, $user_id);

            $response = array(
                'status' => 'success',
                'msg' => 'add comment successfully'
                );
            return Response::json($response);
        }else{
            return 'no';
        }           
    }     
}
