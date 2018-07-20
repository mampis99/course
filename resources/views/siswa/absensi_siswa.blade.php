@extends('master.dashboard_siswa')
@section('title','Absensi Siswa')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
        <small>Siswa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard/siswa"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Absensi</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <label>Klik tombol untuk absen</label>
              <a class="btn btn-app">
                <i class="fa fa-edit"></i>
                Absen
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
                Absensi
              </h3>
            </div>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>No</th>
                  <th>Kode Kelas</th>
                  <th>Keterangan</th>
                  <th>Pertemuan</th>
                  <th>Tanggal</th>
                  <th>Jam</th>
                  <th>Selisih Waktu</th>
                </tr>
                @php
                  $no=1;
                @endphp
                  @foreach ($absensi_siswam as $absensi_siswa)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $absensi_siswa->id_kelas_siswa }}</td>
                      <td>{{ $absensi_siswa->ket }}</td>
                      <td>ke - {{ $absensi_siswa->pertemuan }}</td>
                      <td>{{ date('Y-m-d', strtotime($absensi_siswa->tanggal)) }}</td>
                      <td>{{ date('H:i:s', strtotime($absensi_siswa->tanggal)) }}</td>
                      <td> - </td>
                    </tr>
                  @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
