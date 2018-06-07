@extends('master.pendaftaran')
@section('title','Pendaftaran Siswa')

@section('content')
  <div class="row">
    <div class="box-body">
      <div class="register-logo">
          <a href="/"><b>Merachel</b> Fashion Course</a>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="container">

        <div class="progress">
          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

      <form id="regiration_form" action="/pendaftaran/siswa/save" method="post">
        {{ csrf_field() }}
          <!--form biodata-->
          <fieldset>
            <div class="form-group">
              <h3>Biodata Siswa</h3>
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
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat">
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
            <button type="button" class="next btn btn-primary pull-right" name="button">Next</button>
          </fieldset>

          <!--from data orang tua-->
          <fieldset>
            <h3>Data Orang Tua</h3>
            <div class="form-group">
              <label for="nama_orangtua">Nama Orang Tua</label>
              <input type="text" class="form-control" id="nama_orangtua" name="nama_orangtua">
            </div>
            <div class="form-group">
              <label for="alamat_orangtua">Alamat Orang Tua</label>
              <input type="text" class="form-control" id="alamat_orangtua" name="alamat_orangtua">
            </div>
            <div class="form-group">
              <label for="no_telpon_orangtua">No. Telpon Orang Tua</label>
              <input type="text" class="form-control" id="no_telpon_orangtua" name="no_telpon_orangtua">
            </div>
            <button type="button" class="previous btn btn-default" name="button">Previous</button>
            <button type="button" class="next btn btn-primary pull-right" name="button">Next</button>
          </fieldset>

          <!--form account baru-->
          <fieldset>
            <h3>Account</h3>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="text" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
              <label for="re_password">Re-Password</label>
              <input type="text" class="form-control" id="re_password" name="re_password">
            </div>
            <button type="button" class="previous btn btn-default" name="button">Previous</button>
            <button type="submit" class="submit btn btn-success pull-right" name="submit">Submit</button>
          </fieldset>
      </form>
    </div>
  </div>
@endsection

@section('javascript')

  $(document).ready(function(){
      var current = 1,current_step,next_step,steps;
      steps = $("fieldset").length;
      //console.log(steps);
      $(".next").click(function(){
        current_step = $(this).closest("fieldset");
        next_step = $(this).parent().next();
        next_step.show();
        current_step.hide();
        setProgressBar(++current);
      });
      $(".previous").click(function(){
        current_step = $(this).closest("fieldset");
        next_step = $(this).parent().prev();
        next_step.show();
        current_step.hide();
        setProgressBar(--current);
      });

      $('.submit').click(function(){
        current_step = $(this).submit();
      });

      setProgressBar(current);
      function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
          .css("width",percent+"%")
          .html(percent+"%");
      }
    });

  $('#tanggal_lahir').datepicker({
    autoclose: true
  });

@endsection
