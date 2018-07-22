@extends('master.dashboard_siswa')
@section('title','Pembayaran')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
        <small>Siswa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard/siswa"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Pembayaran</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
                Transaksi
              </h3>
            </div>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>No</th>
                  <th>Kode Transaksi</th>
                  <th>Keterangan</th>
                  <th>Jumlah</th>
                  <th>Tanggal</th>
                </tr>
                @php
                  $no=1;
                @endphp
                @foreach ($pembayarans as $pembayaran)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $pembayaran->kode_transaksi }}</td>
                    <td>{{ $pembayaran->ket }}</td>
                    <td>Rp. {{ number_format($pembayaran->jumlah) }}</td>
                    <td>{{ date('Y-m-d', strtotime($pembayaran->created_date)) }}</td>
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
