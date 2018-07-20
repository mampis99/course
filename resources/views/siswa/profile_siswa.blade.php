@extends('master.dashboard_siswa')
@section('title','Profile Siswa')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
        <small>Siswa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard/siswa"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <!--Left-->
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Biodata Siswa</h3>
            </div>

            <div class="box-body">
              <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" value="{{ $biodata->nm_siswa }}" disabled="">
              </div>
              <div class="form-group">
                <label for="nama_panggil">Nama Panggilan</label>
                <input type="text" class="form-control" id="nama_panggil" value="{{ $biodata->nm_panggilan }}" disabled="">
              </div>
              <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat_lahir" value="{{ $biodata->tempat_lahir }}" disabled="">
              </div>
              <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="text" class="form-control" id="tanggal_lahir" value="{{ $biodata->tanggal_lahir }}" disabled="">
              </div>
              <div class="form-group">
                <label for="gender">Gender</label>
                <input type="text" class="form-control" id="gender" value="{{ $biodata->jenis_kelamin }}" disabled="">
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" value="{{ $biodata->alamat }}" disabled="">
              </div>
              <div class="form-group">
                <label for="kota">Kota</label>
                <input type="text" class="form-control" id="kota" value="{{ $biodata->kota }}" disabled="">
              </div>
              <div class="form-group">
                <label for="propinsi">Propinsi</label>
                <input type="text" class="form-control" id="propinsi" value="{{ $biodata->propinsi }}" disabled="">
              </div>
              <div class="form-group">
                <label for="no_telpon">No. Telpon</label>
                <input type="text" class="form-control" id="no_telpon" value="{{ $biodata->no_telpon }}" disabled="">
              </div>
              <div class="form-group">
                <label for="nama">Email</label>
                <input type="text" class="form-control" id="email" value="{{ $biodata->email }}" disabled="">
              </div>
            </div>
          </div>
        </div>

        <!--Right-->
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Biodata Orang Tua</h3>
            </div>

            <div class="box-body">
              <div class="form-group">
                <label for="nama_ortu">Nama Orang Tua</label>
                <input type="text" class="form-control" id="nama_ortu" value="{{ $biodata->nm_orangtua }}" disabled="">
              </div>
              <div class="form-group">
                <label for="alamat_ortu">Alamat</label>
                <input type="text" class="form-control" id="nama_ortu" value="{{ $biodata->alamat_orangtua }}" disabled="">
              </div>
              <div class="form-group">
                <label for="no_telpon_orangtua">No. Telpon Orang Tua</label>
                <input type="text" class="form-control" id="no_telpon_orangtua" value="{{ $biodata->no_telpon_orangtua }}" disabled="">
              </div>
            </div>
          </div>
          <div class="box box-primary">
            <div class="box-body">
              <p>Info :</p>
              <p>Jika ada data yang ditak sesuai silahkan hubungi Admin Merachel.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
