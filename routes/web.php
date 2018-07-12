<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tst', function () {
    return view('master/dashboard_siswa');
});

//Login
Route::get('/login','LoginController@index');
Route::post('/login/post','LoginController@post_login');
Route::get('/logout','LoginController@logout');

//pendaftaran siswa
Route::get('/pendaftaran/siswa','SiswaController@pendaftaran_siswa');
Route::post('/pendaftaran/siswa/save','SiswaController@pendaftaran_siswa_save');

//dashboard siswa
Route::get('/dashboard/siswa','SiswaController@home');
Route::get('/dashboard/siswa/paket/','SiswaController@paket');
Route::post('/dashboard/siswa/paket/jenis/cari','SiswaController@paket_jenis_cari');
Route::get('/dashboard/siswa/kelas/id={id_kls}','SiswaController@lihat_kelas');
Route::get('/dashboard/siswa/kelas/detail/id={id_kls}','SiswaController@detail_kelas');
Route::post('/dashboard/siswa/kelas/detail/id={id_kls}','SiswaController@kelas_save');
Route::get('/dashboard/siswa/kelas/ambil','SiswaController@kelas_siswa');
Route::get('/dashboard/siswa/jadwal','SiswaController@jadwal_siswa');
Route::get('/dashboard/siswa/absensi','SiswaController@absensi_siswa');
Route::get('/dashboard/siswa/nilai','SiswaController@nilai_siswa');
Route::get('/dashboard/siswa/pembayaran','SiswaController@pembayaran');
Route::get('/dashboard/siswa/testimoni','SiswaController@testimoni');
Route::post('/dashboard/siswa/testimoni/save','SiswaController@testimoni_post');

//pendaftaran guru
Route::get('/pendaftaran/guru', function () {
    return 'form pendaftaran guru';
});

//dashboard guru

//dashboard admin
