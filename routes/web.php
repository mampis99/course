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
    return view('master/pendaftaran');
});

//pendaftaran siswa
Route::get('/pendaftaran/siswa','SiswaController@pendaftaran_siswa');

//dashboard siswa
Route::get('/ok','SiswaController@home');


//pendaftaran guru
Route::get('/pendaftaran/guru', function () {
    return 'form pendaftaran guru';
});

//dashboard guru

//dashboard admin
