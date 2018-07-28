@extends('master.dashboard_admin')
@section('title','Master Area')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Dashboard <small>Area</small></h1>
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
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Master Area</h3>
                </div>
                <div class="box-body">
                    <table class="dataTables_wrapper form-inline dt-bootstrap table table-hover table-striped table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nama</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <form action="{{ route('area.store') }}" method="post">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tambah Area</h3>
                </div>
                <div class="box-body">
                
                    {{ csrf_field() }}
                    <div class="form-group">
                    <label>Nama Area</label>
                    <input type="text" class="form-control" name="area" placeholder="Enter Area">
                    </div>
                
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
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
            ajax: '{!! route('area.get') !!}',
            columns: [
                { data: 'id_area', name: 'id_area' },
                { data: 'nm_area', name: 'nm_area' },
            ]
        });
    });
    </script>
@endpush
