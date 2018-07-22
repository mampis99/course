@extends('master.dashboard_siswa')
@section('title','Nilai')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
        <small>Siswa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard/siswa"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Nilai</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
                Nilai
              </h3>
            </div>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>No</th>
                  <th>Kode Kelas</th>
                  <th>Nama Kelas</th>
                  <th>Materi</th>
                  <th>Nilai</th>
                </tr>
                @php
                  $no=1;
                @endphp
                @foreach ($nilai_siswam as $nilai_siswa)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $nilai_siswa->id_kelas_siswa }}</td>
                    <td>{{ $nilai_siswa->nm_kelas }}</td>
                    <td>{{ $nilai_siswa->materi_ujian }}</td>
                    <td>{{ $nilai_siswa->nilai }}</td>
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
