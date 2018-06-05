@extends('master.pendaftaran')
@section('title','Pendaftaran Siswa')

@section('content')
  <div class="row">
    <div class="box-body">
      <div class="register-logo">
          <a href="#"><b>Merachel</b> Fashion Course</a>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="container">
      <div class="progress">
        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <form id="registration_form" novalidate action="#" method="post">
        <fieldset>
          <h2>Biodata Siswa</h2>
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="from-control" id="nama_siswa" name="nama_siswa" placeholder="Nama Siswa">
          </div>
          <div class="form-group">
            <label for="nama_panggilan">Nama Panggilan</label>
            <input type="text" class="from-control" id="nama_panggilan" name="nama_panggilan" placeholder="Nama Panggilan">
          </div>
          <div class="form-group">
            <label for="tempat_lahir"></label>
            <input type="text" class="from-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir">
          </div>
          <div class="form-group">
            <label for="tanggal_lahir"></label>
            <input type="text" class="from-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir">
          </div>
          <div class="form-group">
            <label for="jenis_kelamin"></label>
            <input type="text" class="from-control" id="jenis_kelamin" name="jenis_kelamin" placeholder="Jenis Kelamin">
          </div>
          <div class="form-group">
            <label for="alamat"></label>
            <input type="text" class="from-control" id="alamat" name="alamat" placeholder="Alamat">
          </div>
          <div class="form-group">
            <label for="kota"></label>
            <input type="text" class="from-control" id="kota" name="kota" placeholder="Kota">
          </div>
          <div class="form-group">
            <label for="propinsi"></label>
            <input type="text" class="from-control" id="propinsi" name="propinsi" placeholder="Propinsi">
          </div>
          <div class="form-group">
            <label for="no_telpon"></label>
            <input type="text" class="from-control" id="no_telpon" name="no_telpon" placeholder="No Telpon">
          </div>
          <div class="form-group">
            <label for="email"></label>
            <input type="email" class="from-control" id="email" name="email" placeholder="Email">
          </div>
        </fieldset>
      </form>
    </div>
  </div>

@endsection
