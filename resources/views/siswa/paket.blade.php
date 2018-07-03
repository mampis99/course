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
                          <select class="form-control" name="id_group" id="InputGroup">
                              <option value="">PILIH JENIS PAKET</option>
                            @foreach ($group_pakets as $group_paket)
                              <option value="{{ $group_paket->id_group }}">{{ $group_paket->nm_group }}</option>
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
          @if (count($data_pakets)>0)
            @foreach ($data_pakets as $data_paket)
              <div class="col-md-4">
                <div class="box box-solid">
                  <div class="box-header with-border">
                    <i class="fa fa-diamond"></i>
                    <h4 class="box-title">{{ $data_paket->nm_paket }}</h3>
                  </div>
                  <div class="box-body">
                    <img class="img-responsive" src="{{ URL::asset('img') }}/{{ $data_paket->img_paket }}" alt="Photo">
                    <br>
                    <table>
                      <tr>
                        <td><label>Tingkat</label></td>
                        <td> : </td>
                        <td>{{ $data_paket->tingkat_mahir }}</td>
                      </tr>
                      <tr>
                        <td><i class="fa fa-map-marker" style="margin-right : 5px;"></i><label>....</label></td>
                      </tr>
                      <tr>
                        <td><label>Mulai Harga</label></td>
                        <td> : </td>
                        <td>Rp {{ number_format($data_paket->min_harga) }}</td>
                      </tr>
                    </table>
                    <a class="btn btn-primary btn-block" href="{{'/dashboard/siswa/kelas/id='}}{{$data_paket->id_paket}}">Lihat Kelas</a>
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
