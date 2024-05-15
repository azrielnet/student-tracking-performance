@extends('layouts.layout')

@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><img src="../asset/img/grade.png" width="40"> Data Kelas</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Kelas</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      @if (\Session::has('success'))
        <h6 class="bg-green-500/90 text-start px-3 text-white p-1 mb-2 rounded-lg ring-2 ring-green-800 shadow-md">
          {!! \Session::get('success') !!}</h6>
      @endif
      @if (\Session::has('error'))
        <h6 class="bg-red-500/90 text-start px-3 text-white p-1 mb-2 rounded-lg ring-2 ring-red-800 shadow-md">
          {!! \Session::get('error') !!}</h6>
      @endif
      <div class="card card-info">
        <form action="/grade/add" method="POST">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="card-header">
                  <span class="fa fa-file"> Data Kelas</span>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kelas</label>
                      <input type="text" class="form-control" name="kelas" placeholder="Kelas ">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add New</button>
                </div>
        </form>
      </div>

      <div class="col-md-8" style="border-left: 1px solid #ddd;">
        <table id="example1" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Data Kelas</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $kelas)
              @php
                $slug = $kelas->kelas_slug;
              @endphp
              <tr>
                <td>Kelas {{ $kelas->kelas }}</td>
                <td class="text-center">
                  <a class="btn btn-sm btn-success" href="#" data-toggle="modal"
                    data-target="#edit-{{ $slug }}"><i class="fa fa-edit"></i> update</a>
                  <a class="btn btn-sm btn-danger" href="#" data-toggle="modal"
                    data-target="#delete-{{ $slug }}"><i class="fa fa-trash-alt"></i> delete</a>
                </td>
              </tr>

              {{-- Edit Modal --}}
              <div id="edit-{{ $slug }}" class="modal animated rubberBand delete-modal" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-md">
                  <div class="modal-content">
                    <div class="modal-body text-center">
                      <form action="/grade/update" method="POST">
                        @csrf
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="card-header">
                                <h5><img src="../asset/img/score.png" width="40">Kelas {{ $kelas->kelas }}</h5>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <input type="text" name="kelas_slug" value="{{ $slug }}" hidden>
                                    <label class="float-left">Kelas</label>
                                    <input type="text" class="form-control" name="kelas" value="{{ $kelas->kelas }}"
                                      placeholder="Kelas">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <a href="#" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                          <button type="submit" class="btn btn-info">Save</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              {{-- Delete Modal --}}
              <div id="delete-{{ $slug }}" class="modal animated rubberBand delete-modal" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-body text-center">
                      <img src="../asset/img/profile.png" alt="" width="50" height="46">
                      <h3>Apakah Kamu Ingin Menghapus Nilai Ini?</h3>
                      <div class="m-t-20">
                        <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                        <a href="/grade/delete/{{ $slug }}" class="btn btn-danger">Delete</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </section>
@endsection

{{-- Content Bawah --}}
@section('content-b')
  <!-- jQuery -->
  <script src="/asset/jquery/jquery.min.js"></script>
  <script src="/asset/js/bootstrap.bundle.min.js"></script>
  <script src="/asset/js/adminlte.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="/asset/tables/datatables/jquery.dataTables.min.js"></script>
  <script src="/asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="/asset/tables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>s
  <script src="/asset/tables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script>
    $(function() {
      $("#example1").DataTable();
    });
  </script>
@endsection
