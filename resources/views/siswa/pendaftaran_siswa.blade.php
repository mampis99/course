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
      <div class="col-md-6">
        <div class="row">
          <div class="progress">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
        <form action="#" method="post">
          <!--form biodata-->
          <fieldset>
            <div class="row">
              <div class="box">
                <div class="box-header">
                  <h3>Biodata Siswa</h3>
                </div>
                <div class="box-body">
                  <div class="form-group">
                    <label for="nama_siswa">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa">
                  </div>
                  <div class="form-group">
                    <label for="nama_panggilan">Nama Panggilan</label>
                    <input type="text" class="form-control" id="nama_panggilan" name="nama_panggilan">
                  </div>
                  <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                  </div>
                  <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                  </div>
                  <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                  </div>
                  <div class="form-group">
                    <label for="kota">Kota</label>
                    <input type="text" class="form-control" id="kota" name="kota">
                  </div>
                  <div class="form-group">
                    <label for="propinsi">Propinsi</label>
                    <input type="text" class="form-control" id="propinsi" name="propinsi">
                  </div>
                  <div class="form-group">
                    <label for="no_telpon">No Telpon</label>
                    <input type="text" class="form-control" id="no_telpon" name="no_telpon">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email">
                  </div>
                  <div class="form-group">
                    <label for="id_referal">Id Referal</label>
                    <input type="text" class="form-control" id="id_referal" name="#">
                  </div>
                  <button type="button" class="btn btn-primary pull-right" name="button">Next</button>
                </div>
              </div>
            </div>
          </fieldset>

          <!--from data orang tua-->
          <fieldset>
            <div class="row">
              <div class="box">
                <div class="box-header">
                  <h3>Data Orang Tua</h3>
                </div>
                <div class="box-body">
                  <div class="form-group">
                    <label for="nama_orangtua">Nama Orang Tua</label>
                    <input type="text" class="form-control" id="nama_orangtua" name="nama_orangtua">
                  </div>
                  <div class="form-group">
                    <label for="alamat_orangtua">Alamat Orang Tua</label>
                    <input type="text" class="form-control" id="alamat_orangtua" name="alamat_orangtua">
                  </div>
                  <div class="form-group">
                    <label for="alamat_orangtua">Alamat Orang Tua</label>
                    <input type="text" class="form-control" id="alamat_orangtua" name="alamat_orangtua">
                  </div>
                </div>
              </div>
            </div>
          </fieldset>

          <!--form account baru-->
          <fieldset>
            <div class="row">

            </div>
          </fieldset>
        </form>
      </div>


    </div>
  </div>

@endsection
