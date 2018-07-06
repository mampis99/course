@extends('master.dashboard_siswa')
@section('title','Kelas')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
        <small>Siswa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard/siswa"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">Paket</a></li>
        <li class="active">Kelas</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Pilih Kelas</h3>
            </div>

            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Kelas</th>
                    <th>Level</th>
                    <th>Jenis</th>
                    <th>Area</th>
                    <th>Harga</th>
                    <th>Show</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $no = 1;
                  @endphp
                  @foreach ($data_kelasm as $data_kelas)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $data_kelas->nm_kelas }}</td>
                      <td>{{ $data_kelas->level }}</td>
                      <td>{{ $data_kelas->nm_jenis_kelas }}</td>
                      <td>{{ $data_kelas->nm_area }}</td>
                      <td>Rp. {{ number_format($data_kelas->harga) }}</td>
                      <td>
                        <a class="btn btn-info" href="{{'/dashboard/siswa/kelas/detail/id='}}{{$data_kelas->id_kelas}}">Detail Kelas</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
@section('javascript')
  <script>
    $(function () {
      $('#example2').DataTable({
        'paging'      :true,
        'lengthChange':false,
        'searching'   :false,
        'ordering'    :true,
        'info'        :true,
        'autoWidth'   :false
      })
    })
  </script>
@endsection
