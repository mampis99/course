<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{

    public function pendaftaran_siswa()
    {
      return view('siswa/pendaftaran_siswa');
    }

    public function pendaftaran_siswa_save(Request $request)
    {
      $this->validate($request,[
              'nama_siswa'=>'required',
              'nama_panggilan'=>'required',
              'tempat_lahir'=>'required',
              'tanggal_lahir'=>'required',
              'jenis_kelamin'=>'required',
              'alamat'=>'required',
              'kota'=>'required',
              'propinsi'=>'required',
              'no_telpon'=>'required',
              'email'=>'required',

              'nama_orangtua'=>'required',
              'alamat_orangtua'=>'required',
              'no_telpon_orangtua'=>'required',

              'username'=>'required',
              'password'=>'required'

            ]);

      $max_siswa = DB::table('m_siswa')->max('id_siswa');

      $tahun_ini = date('Y');
      $bulan_ini = date('m');
      $char1 = "MRC";
      $char2 = "DFT";
      $status = "OPN";
      $tanggal_daftar = date('Y-m-d');
      $convert_date = date('Y-m-d',strtotime($request['tanggal_lahir']));
      $role = "siswa";
      $i = 0;

      if (count($max_siswa)==0) {
        $id_siswa = $char1."/".$char2."/".$tahun_ini."/".$bulan_ini."/".sprintf('%04s',1);
      }
      else {
        $get_nomor = explode("/",$max_siswa);
        $nomor_urut = $get_nomor[4]+1;
        $id_siswa = $char1."/".$char2."/".$tahun_ini."/".$bulan_ini."/".sprintf('%04s',$nomor_urut);
      }
      //dd($max_siswa);
      //dd($convert_date);

      DB::table('m_siswa')->insert([
                  [
                    'id_siswa'=>$id_siswa,
                    'nm_siswa'=>$request['nama_siswa'],
                    'nm_panggilan'=>$request['nama_panggilan'],
                    'tempat_lahir'=>$request['tempat_lahir'],
                    'tanggal_lahir'=>$convert_date,
                    'jenis_kelamin'=>$request['jenis_kelamin'],
                    'alamat'=>$request['alamat'],
                    'kota'=>$request['kota'],
                    'propinsi'=>$request['propinsi'],
                    'no_telpon'=>$request['no_telpon'],
                    'email'=>$request['email'],
                    'status'=>$status,
                    'created_date'=>$tanggal_daftar
                  ]
                ]);
      //=================================================================================================
      DB::table('r_orangtua')->insert([
                  [
                    'id_user'=>$id_siswa,
                    'nm_orangtua'=>$request['nama_orangtua'],
                    'alamat_orangtua'=>$request['alamat_orangtua'],
                    'no_telpon_orangtua'=>$request['no_telpon_orangtua'],
                    'created_date'=>$tanggal_daftar
                  ]
                ]);
      //================================================================================================
      DB::table('r_login')->insert([
                  [
                    'id_user'=>$id_siswa,
                    'username'=>$request['username'],
                    'password'=>$request['password'],
                    'role'=>$role,
                    'status'=>$i,
                    'created_date'=>$tanggal_daftar,
                  ]
                ]);
      return redirect('/pendaftaran/siswa');
    }

    public function home()
    {
      return view('siswa/home');
    }

    public function paket()
    {
      $group_paket = DB::table('m_group_paket')
                        ->where('status','=','AKTIF')
                        ->select('id_group','nm_group')
                        ->get();
      $data_paket = null;
      //dd(count($data_kelas));
      //d($jenis_paket);
      return view('siswa/paket')->with([
                                        'group_pakets'=>$group_paket,
                                        'data_pakets'=>$data_paket
                                      ]);
    }

    public function paket_jenis_cari(Request $request)
    {
      $group_paket = DB::table('m_group_paket')
                        ->where('status','=','AKTIF')
                        ->select('id_group','nm_group')
                        ->get();

      $id_group = $request->id_group;
      //dd($id_group);
      $data_paket = DB::table('r_paket')
                      ->where('r_paket.id_group','=',$id_group)
                      ->where('r_paket.status','=','AKTIF')
                      ->join('m_tingkat_mahir','r_paket.id_tingkat_mahir','=','m_tingkat_mahir.id_tingkat_mahir')
                      ->select('r_paket.id_paket','r_paket.nm_paket','r_paket.img_paket','r_paket.min_harga',
                               'm_tingkat_mahir.tingkat_mahir')
                      ->get();
      //dd($data_paket);
      return view('siswa/paket')->with([
                                        'group_pakets'=>$group_paket,
                                        'data_pakets'=>$data_paket
                                      ]);
    }

    public function lihat_kelas($id_kls)
    {
      $data_kelas = DB::table('r_kelas')
                        ->where('r_kelas.id_paket','=',$id_kls)
                        ->join('m_jenis_kelas','r_kelas.id_jenis_kelas','=','m_jenis_kelas.id_jenis_kelas')
                        ->join('m_area','r_kelas.id_area','=','m_area.id_area')
                        ->select('r_kelas.id_kelas','r_kelas.nm_kelas','r_kelas.level','r_kelas.harga',
                                 'm_jenis_kelas.nm_jenis_kelas',
                                 'm_area.nm_area')
                        ->get();

      //dd($data_kelas);
      return view('siswa/kelas')->with([
                                        'data_kelasm'=>$data_kelas
                                      ]);
    }

    public function detail_kelas($id_kls)
    {
      $detail_kelas = DB::table('r_kelas')
                          ->where('r_kelas.id_kelas','=',$id_kls)
                          ->where('status','=','AKTIF')
                          ->get();
      dd($detail_kelas);
    }
}
