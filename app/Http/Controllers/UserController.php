<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\User;
use App\Status;

class UserController extends Controller
{
    
   
    public function index($id){
     $user = User::getUser($id);
     $status = Status::getStatusByUser($id);
     return view('users.index', [
      'user'   => $user,
      'status' => $status
      ]);
    }
    public function GetName($id)
    {
        $username = DB::select('select name from users where id = ?', [$id]);
        return $username; 
    }
   
    
}
