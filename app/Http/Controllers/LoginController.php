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
      //data loin revisi
      $login = DB::table('r_login')
                  ->where('r_login.status','=',1)
                  ->where('r_login.username','=',$username)
                  ->select('r_login.id_user','r_login.username','r_login.password','r_login.role','r_login.status')
                  ->first();

      if (count($login)>0)
      {
        if (Hash::check($password, Hash::make($login->password)))
        {
          if ($login->role == "siswa")
          {
            $data = DB::table('m_siswa')
                      ->where('m_siswa.id_siswa','=',$login->id_user)
                      ->where('m_siswa.status','=','aktif')
                      ->first();

            Session::put('id',$data->id_siswa);
            Session::put('nama',$data->nm_siswa);
            Session::put('username',$username);
            Session::put('password',$password);

            return redirect('/dashboard/siswa');
          }
          if ($login->role == "guru")
          {
            $data = DB::table('m_guru')
                       ->where('m_guru.id_guru','=',$login->id_user)
                       ->where('m_guru.status','=','aktif')
                       ->first();

            Session::put('id',$data->id_guru);
            Session::put('nama',$data->nm_guru);
            Session::put('username',$username);
            Session::put('password',$password);

            return "halaman guru";
          }
          if ($login->role == "admin")
          {

            //Session::put('id',$data->id_siswa);
            Session::put('nama','Admin');
            Session::put('username',$username);
            Session::put('password',$password);
            return redirect('/dashboard/admin');
          }
        }
        else {
          //password salah
          return redirect('login');
        }
      }
      else
      {
        return "o";
      }
      //dd($data);

    }

    public function logout()
    {
      Session::flush();
      return redirect('/');
    }
}
