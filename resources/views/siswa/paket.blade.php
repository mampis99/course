@extends('master.dashboard_siswa')
@section('title','Paket')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
        <small>Siswa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard/siswa"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Paket</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Pilih Paket</h3>
            </div>
            <div class="row">
              <div class="box-body">
                <div class="col-md-3">
                  <form action="/dashboard/siswa/paket/jenis/cari" method="post">
                    {{ csrf_field() }}
                    <table>
                      <tr>
                        <td style="width : 74%">
                          <select class="form-control" name="id_group_kelas" id="InputGroupKelas">
                              <option value="">PILIH JENIS PAKET</option>
                            @foreach ($group_kelass as $group_kelas)
                              <option value="{{ $group_kelas->id_group_kelas }}">{{ $group_kelas->nm_group_kelas }}</option>
                            @endforeach
                          </select>
                        </td>
                        <td>
                            <button class="btn btn-info pull-right" type="submit" name="btn" >CARI</button>
                        </td>
                      </tr>
                    </table>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="">
          @if (count($data_kelass)>0)
            @foreach ($data_kelass as $data_kelas)
              <div class="col-md-4">
                <div class="box box-solid">
                  <div class="box-header with-border">
                    <i class="fa fa-diamond"></i>
                    <h4 class="box-title">{{ $data_kelas->nm_kelas }}</h3>
                  </div>
                  <div class="box-body">
                    <img class="img-responsive" src="{{ URL::asset('img') }}/{{ $data_kelas->id_gambar }}" alt="Photo">
                    <br>
                    <table>
                      <tr>
                        <td><label>Tingkat : {{ $data_kelas->tingkat_mahir }}</label></td>
                      </tr>
                      <tr>
                        <td><i class="fa fa-map-marker" style="margin-right : 5px;"></i><label>{{ $data_kelas->nm_area }}</label></td>
                      </tr>
                      <tr>
                        <td><label>Harga : Rp {{ number_format($data_kelas->harga) }}</label></td>
                      </tr>
                    </table>
                    <a class="btn btn-primary btn-block" href="{{'/dashboard/siswa/paket/id='}}{{$data_kelas->id_det_kelas}}">Lihat Detail</a>
                  </div>
                </div>
              </div>
            @endforeach
          @endif
        </div>
      </div>
    </section>
  </div>
@endsection
