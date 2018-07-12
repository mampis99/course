@extends('master.dashboard_siswa')
@section('title','Paket Detail')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
        <small>Siswa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard/siswa"><i class="fa fa-dashboard"></i>Home</a></li>
        <li>Kelas</li>
        <li class="active">Detail</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <!--Left-->
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-body">
              <img class="img-responsive" src="{{ URL::asset('img') }}/{{ $detail_kelas->img_kelas }}" alt="Photo">
            </div>
          </div>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Info</h3>
            </div>
            <div class="box-body">
              <p class="text-muted">Jumlah Peserta : ... siswa</p>
              <p class="text-muted">Status : ... </p>
            </div>
          </div>
        </div>

        <!--Right-->
        <div class="col-md-6">
          <div class="box box-primary">
            <!--Custom Tabs-->
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Detail</a></li>
                <li><a href="#tab_2" data-toggle="tab">Jadwal</a></li>
                <li><a href="#tab_3" data-toggle="tab">Persyaratan</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab_1">

                  <b>{{ $detail_kelas->nm_kelas }}</b><br>
                  <p>{{ $detail_kelas->ket }}</p>
                  <b>Detail Kursus</b>

                  <table style="width: 65%;">
                    <tbody>
                      <tr>
                        <td>Jadwal </td>
                        <td> : </td>
                        <td>{{ $jumlah_jadwal }} Gelombang</td>
                      </tr>
                      <tr>
                        <td>Tingkat </td>
                        <td> : </td>
                        <td>{{ $detail_kelas->tingkat_mahir }}</td>
                      </tr>
                      <tr>
                        <td>Jenis Kelas</td>
                        <td> : </td>
                        <td>{{ $detail_kelas->nm_jenis_kelas }}</td>
                      </tr>
                      <tr>
                        <td>Total Pertemuan </td>
                        <td> : </td>
                        <td>{{ $detail_kelas->jml_pertemuan }} x </td>
                      </tr>
                      <tr>
                        <td>Harga </td>
                        <td> : </td>
                        <td>Rp {{ number_format($detail_kelas->harga) }}</td>
                      </tr>
                      <tr>
                        <td>Angsuran </td>
                        <td> : </td>
                        <td>{{ $detail_kelas->cicilan }} X</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                  <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                      <tbody>
                        <tr>
                          <th>No</th>
                          <th>Hari</th>
                          <th>Jam</th>
                        </tr>
                        @php
                          $no = 1;
                        @endphp
                        @foreach ($jadwal_kelasm as $jadwal_kelas)
                          <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $jadwal_kelas->hari }}</td>
                            <td>{{ $jadwal_kelas->jam }}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                  <p>Usia minimal 17 tahun.</p>
                  <p>Membawa perlatan sendiri :</p>
                  <ul>
                    <li>Pencil, Eraser, Pensil</li>
                    <li>Penggaris gradiasi untuk pola</li>
                    <li>Penggaris curve dan L untuk pola</li>
                    <li>Kertas Pola (diutamakan warna putih)</li>
                    <li>Masking Tape</li>
                    <li>Jarum pentul</li>
                    <li>Kapur penjahit</li>
                    <li>Measurement tape</li>
                    <li>Gunting kertas</li>
                    <li>Gunting kain</li>
                    <li>Kain belacu</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Pilih Jadwal dan Metode Pembayaran</h3>
            </div>
            <form class="form-horizontal" action="{{url()->current()}}" method="POST">
              {{ csrf_field() }}
              <div class="box-body">
                @if (count($btn)>0)
                  <div class="alert alert-info">
                    <strong>Info!</strong> Anda sudah memilih kelas tersebut.
                  </div>
                @endif
                <div class="form-group">
                  <label for="inputArea" class="col-sm-5 control-label">Area</label>
                  <div class="col-sm-6">
                    <select class="form-control" disabled="" id="inputArea" name="area_kursus">
                      <option value="{{ $detail_kelas->id_area }}">{{ $detail_kelas->nm_area }}</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputKelas" class="col-sm-5 control-label">Jenis Kelas</label>
                  <div class="col-sm-6">
                    <select class="form-control" disabled="" id="inputKelas" name="jenis_kelas">
                      <option value="{{ $detail_kelas->id_jenis_kelas }}">{{ $detail_kelas->nm_jenis_kelas }}</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputJam" class="col-sm-5 control-label">Pilih Jam dan Hari</label>
                  <div class="col-sm-6">
                    <select class="form-control" id="inputJam" name="jam_hari">
                      @foreach ($jadwal_kelasm as $jadwal_kelas)
                        <option value="{{ $jadwal_kelas->id_jdw_kelas }}">{{ $jadwal_kelas->hari }} || {{ $jadwal_kelas->jam }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputBayar" class="col-sm-5 control-label">Metode Pembayaran</label>
                  <div class="col-sm-6">
                    <select class="form-control" id="inputBayar" name="metode_bayar">
                      <option>TUNAI</option>
                      <option>TRANSFER</option>
                    </select>
                  </div>
                </div>

              </div>
              <div class="box-footer">
                <button type="button" class="btn btn-info pull-right" disabled="{{ $btn }}">OK</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection
