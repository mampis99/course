@extends('master.dashboard_admin')
@section('title','Master Siswa')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Dashboard <small>Siswa</small></h1>
    </section>
    <section class="content">
        @if ($errors->any())
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif
        @if (session()->has('message'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            </div>
        </div>
        @endif
      <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Master Siswa</h3>
                </div>
                <div class="box-body">
                    <table class="dataTables_wrapper form-inline dt-bootstrap table table-hover table-striped table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
      </div>
    </section>
  </div>
@endsection
@push('js')
<script>
    $(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('siswa.get') !!}',
            columns: [
                { data: 'id_siswa', name: 'id_siswa' },
                { data: 'nm_siswa', name: 'nm_siswa' },
                { data: 'username', name: 'username' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action' },
            ]
        });
    });
    </script>
@endpush
