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


//pendaftaran siswa
Route::get('/pendaftaran/siswa','SiswaController@pendaftaran_siswa');
Route::post('/pendaftaran/siswa/save','SiswaController@pendaftaran_siswa_save');

//dashboard siswa
Route::get('/dashboard/siswa','SiswaController@home');


//pendaftaran guru
Route::get('/pendaftaran/guru', function () {
    return 'form pendaftaran guru';
});

//dashboard guru

//dashboard admin
