@extends('master.dashboard_siswa')
@section('title','Kelas Siswa')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
        <small>Siswa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard/siswa"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Kelas Siswa</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
                Kelas
              </h3>
            </div>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Id</th>
                  <th>Nama Kelas</th>
                  <th>Tingkat</th>
                  <th>Level</th>
                  <th>Jenis Kelas</th>
                  <th>Area</th>
                  <th>Pembayaran</th>
                </tr>
                @foreach ($ambil_kelasm as $ambil_kelas)
                  <tr>
                    <td>{{ $ambil_kelas->id_kelas_siswa }}</td>
                    <td>{{ $ambil_kelas->nm_kelas }}</td>
                    <td>{{ $ambil_kelas->tingkat_mahir }}</td>
                    <td>{{ $ambil_kelas->level }}</td>
                    <td>{{ $ambil_kelas->nm_jenis_kelas }}</td>
                    <td>{{ $ambil_kelas->nm_area }}</td>
                    <td>GO></td>
                  </tr>
                @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <p>Info :</p>
              <p>Untuk membatalkan kelas yang telah dipilih harap hubungi admin.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
