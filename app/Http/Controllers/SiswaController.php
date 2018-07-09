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
                          ->where('r_kelas.status','=','AKTIF')
                          ->join('m_area','r_kelas.id_area','=','m_area.id_area')
                          ->join('m_jenis_kelas','r_kelas.id_jenis_kelas','=','m_jenis_kelas.id_jenis_kelas')
                          ->join('r_paket','r_kelas.id_paket','=','r_paket.id_paket')
                          ->join('m_tingkat_mahir','r_paket.id_tingkat_mahir','=','m_tingkat_mahir.id_tingkat_mahir')
                          ->first();
      //dd($detail_kelas);
      $jadwal_kelas = DB::table('r_jadwal_kelas')
                        ->where('r_jadwal_kelas.id_kelas','=',$id_kls)
                        ->get();

      $jumlah_jadwal = DB::table('r_jadwal_kelas')
                        ->where('r_jadwal_kelas.id_kelas','=',$id_kls)
                        ->count();

      //dd($jumlah_jadwal);
      return view('siswa/detail_kelas')->with([
                                            'detail_kelas'=>$detail_kelas,
                                            'jadwal_kelasm'=>$jadwal_kelas,
                                            'jumlah_jadwal'=>$jumlah_jadwal
                                          ]);
    }

    public function kelas_save(Request $request, $id_kls)
    {
      $max_kelas_siswa = DB::table('r_kelas_siswa')->max('id_kelas_siswa');
      $tahun_ini = date('Y');
      $bulan_ini = date('m');
      $char1 = "MRC";
      $char2 = "KLS";
      $status = "OPN";
      $tanggal_daftar = date('Y-m-d');

      //dd($max_kelas_siswa);

      if (count($max_kelas_siswa)==0) {
        $id_kelas_siswa = $char1."/".$char2."/".$tahun_ini."/".$bulan_ini."/".sprintf('%04s',1);
      }
      else {
        $get_nomor = explode("/",$max_kelas_siswa);
        $nomor_urut = $get_nomor[4]+1;
        $id_kelas_siswa = $char1."/".$char2."/".$tahun_ini."/".$bulan_ini."/".sprintf('%04s',$nomor_urut);
      }

      $username = Session::get('username');

      $id_siswa = DB::table('r_login')
                      ->where('r_login.username','=',$username)
                      ->where('r_login.role','=','siswa')
                      ->where('r_login.status','=',1)
                      ->select('r_login.id_user')
                      ->first();
      //dd($id_siswa);

      DB::table('r_kelas_siswa')->insert([
                                          [
                                            'id_kelas_siswa'=>$id_kelas_siswa,
                                            'id_siswa'=>$id_siswa->id_user,
                                            'id_kelas'=>$id_kls,
                                            'id_jdw_kelas'=>$request['jam_hari'],
                                            'metode_bayar'=>$request['metode_bayar'],
                                            'status'=>$status,
                                            'created_date'=>$tanggal_daftar
                                          ]
                                        ]);
        return redirect('/dashboard/siswa/paket');
    }

    public function kelas_siswa()
    {
      $username = Session::get('username');

      $id_siswa = DB::table('r_login')
                      ->where('r_login.username','=',$username)
                      ->where('r_login.role','=','siswa')
                      ->where('r_login.status','=',1)
                      ->select('r_login.id_user')
                      ->first();

      $ambil_kelas = DB::table('r_kelas_siswa')
                        ->where('r_kelas_siswa.id_siswa','=',$id_siswa->id_user)
                        ->join('r_kelas','r_kelas_siswa.id_kelas','=','r_kelas.id_kelas')
                        ->join('r_paket','r_kelas.id_paket','=','r_paket.id_paket')
                        ->join('m_tingkat_mahir','r_paket.id_tingkat_mahir','=','m_tingkat_mahir.id_tingkat_mahir')
                        ->join('m_area','r_kelas.id_area','=','m_area.id_area')
                        ->join('m_jenis_kelas','r_kelas.id_jenis_kelas','=','m_jenis_kelas.id_jenis_kelas')
                        ->select('r_kelas_siswa.id_kelas_siswa',
                                 'r_kelas.nm_kelas','r_kelas.level',
                                 'm_area.nm_area',
                                 'm_tingkat_mahir.tingkat_mahir',
                                 'm_jenis_kelas.nm_jenis_kelas')
                        ->get();

      //dd($ambil_kelas);

      return View('siswa/kelas_ambil')->with([
                                              'ambil_kelasm'=>$ambil_kelas
                                            ]);
    }

    public function jadwal_siswa()
    {
      $username = Session::get('username');

      $id_siswa = DB::table('r_login')
                      ->where('r_login.username','=',$username)
                      ->where('r_login.role','=','siswa')
                      ->where('r_login.status','=',1)
                      ->select('r_login.id_user')
                      ->first();

      $jadwal_siswa = DB::table('r_kelas_siswa')
                        ->where('r_kelas_siswa.id_siswa','=',$id_siswa->id_user)
                        ->where('r_jadwal_siswa.status','=','AKTIF')
                        ->join('r_jadwal_siswa','r_kelas_siswa.id_kelas_siswa','=','r_jadwal_siswa.id_kelas_siswa')
                        ->get();

      //date_default_timezone_set('Asia/Jakarta');
      //$tanggal1 = date('Y-m-d H:i:s');
      //$tanggal2 = date('Y-m-d H:i:s', strtotime('2017-07-06 10:18:00'));

      //$se = date('Y-m-d H:i:s', strtotime($tanggal1 - $tanggal2));

      //dd($se);
      return View('siswa/jadwal_siswa')->with([
                                                'jadwal_siswam'=>$jadwal_siswa
                                              ]);
    }

    public function absensi_siswa()
    {
      $username = Session::get('username');

      $absensi_siswa = DB::table('r_login')
                      ->where('r_login.username','=',$username)
                      ->where('r_login.role','=','siswa')
                      ->where('r_kelas_siswa.status','=','AKTIF')
                      ->where('r_login.status','=',1)
                      ->join('r_kelas_siswa','r_login.id_user','=','r_kelas_siswa.id_siswa')
                      ->join('r_absen_siswa','r_kelas_siswa.id_kelas_siswa','=','r_absen_siswa.id_kelas_siswa')
                      //->select('r_login.id_user',
                      //         'r_kelas_siswa.id_kelas_siswa')
                      ->get();

      //dd($absensi_siswa);
      //$absensi_siswa = DB::table('r_absen_siswa')
      //                    ->where('r_absen_siswa.id_siswa','=',$id->id_user)
      //                    ->where('r_absen_siswa.id_kelas_siswa','=',$id->id_kelas_siswa)
      //                    ->select('r_absen_siswa.id_kelas_siswa','r_absen_siswa.id_siswa','r_absen_siswa.ket','r_absen_siswa.pertemuan','r_absen_siswa.tanggal')
      //                    ->get();

      return view('siswa/absensi_siswa')->with([
                                                'absensi_siswam'=>$absensi_siswa
                                              ]);
    }

    public function nilai_siswa()
    {
      $username = Session::get('username');
      $nilai_siswa = DB::table('r_login')
                      ->where('r_login.username','=',$username)
                      ->where('r_login.role','=','siswa')
                      ->where('r_login.status','=',1)
                      ->where('r_kelas_siswa.status','=','AKTIF')
                      ->join('r_kelas_siswa','r_login.id_user','=','r_kelas_siswa.id_siswa')
                      ->join('r_report_ujian','r_kelas_siswa.id_kelas_siswa','=','r_report_ujian.id_kelas_siswa')
                      //->select('r_login.id_user',
                      //         'r_kelas_siswa.id_kelas_siswa')
                      ->get();

      dd($nilai_siswa);
      return view('siswa/nilai_siswa')->with([
                                              'nilai_siswam'=>$nilai_siswa
                                            ]);
    }

}
