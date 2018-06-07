<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
      return view('login');
    }

    public function post_login(Request $request)
    {
      $username = $request->username;
      $password = $request->password;

      //dd($username." ".$password);
      $data = DB::table('r_login')
                  ->where('status','=',1)
                  ->where('username','=',$username)
                  ->select('id_user','username','role','status')
                  ->first();
      if (count($data)>0)
      {
        return "ada";
      }
      else
      {
        return "o";
      }
      //dd($data);

    }
}
