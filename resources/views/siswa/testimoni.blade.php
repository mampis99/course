@extends('master.dashboard_siswa')
@section('title','Testimoni')
@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
        <small>Siswa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard/siswa"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Testimoni</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">

            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- konten modal-->
                <div class="modal-content">
                  <!-- heading modal -->
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Message</h4>
                  </div>
                  <!-- body modal -->
                  <div class="modal-body">
                    <p>Terima Kasih atas Partisipasinya</p>
                  </div>
                  <!-- footer modal -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                  </div>
                </div>
              </div>
            </div>

            <form action="/dashboard/siswa/testimoni/save" method="post">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label>Komentar Anda tentang Merachel :</label>
                  <textarea name="testimoni" class="form-control" rows="4" placeholder="komentar anda..."></textarea>
                </div>
                @if (count($errors)>0)
                  @foreach ($errors->all() as $error)
                    <div class="col-md-3 alert alert-danger">
                      {{ $error }}
                    </div>
                  @endforeach
                @endif
                <div class="box-footer">
                  <button type="reset" class="btn btn-default">Reset</button>
                  <button type="submit" class="btn btn-info pull-right">OK</button>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
