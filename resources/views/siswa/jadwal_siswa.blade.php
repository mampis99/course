@extends('master.dashboard_siswa')
@section('title','Jadwal Siswa')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
        <small>Siswa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard/siswa"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Jadwal</li>
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
                  <th>No</th>
                  <th>Id Kelas</th>
                  <th>Id Guru</th>
                  <th>Pertemuan</th>
                  <th>Keterangan</th>
                  <th>Tanggal</th>
                  <th>Jam</th>
                </tr>
                @php
                  $no=1;
                @endphp
                @foreach ($jadwal_siswam as $jadwal_siswa)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $jadwal_siswa->id_kelas_siswa }}</td>
                    <td>{{ $jadwal_siswa->id_guru }}</td>
                    <td>ke - {{ $jadwal_siswa->pertemuan }}</td>
                    <td>{{ $jadwal_siswa->ket }}</td>
                    <td>{{ $jadwal_siswa->tanggal }}</td>
                    <td>{{ $jadwal_siswa->jam }}</td>
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
              <p>...</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
