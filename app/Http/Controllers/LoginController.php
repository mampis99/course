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
                  ->where('r_login.status','=',1)
                  ->where('r_login.username','=',$username)
                  ->join('m_siswa','r_login.id_user','=','m_siswa.id_siswa')
                  ->select('r_login.id_user','m_siswa.nm_siswa','r_login.username','r_login.password','r_login.role','r_login.status')
                  ->first();
      dd($data);
      if (count($data)>0)
      {
        if (Hash::check($password, Hash::make($data->password)))
        {
          if ($data->role == "siswa")
          {
            Session::put('id',$data->id_siswa);
            Session::put('username',$data->username);
            Session::put('password',$password);
            return redirect('/dashboard/siswa');
          }
          if ($data->role == "guru")
          {
            //Session::put('id',$data->id_siswa);
            //Session::put('username',$data->username);
            //Session::put('password',$password);
            return "halaman guru";
          }
        }
        else {
          return "pass salah";
        }
      }
      else
      {
        return "o";
      }
      //dd($data);

    }
}
