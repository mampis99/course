<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{

    public function pendaftaran_siswa()
    {
      return view('siswa/pendaftaran_siswa');
    }
    public function home()
    {
      return 'test';
    }
}
