@extends('layouts.layout')

@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><img src="../asset/img/student.png" width="40"> Student List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Students</li>
          </ol>
        </div><br>
        <a class="btn btn-sm btn-info elevation-4" href="#" data-toggle="modal" data-target="#add"
          style="margin-left: 7px;"><i class="fa fa-plus-square"></i>
          Add New</a>
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
        <br>
        <div class="col-md-12">
          <table id="example1" class="table">
            <thead class="btn-cancel">
              <tr>
                <th>Profile</th>
                <th>Nama Guru</th>
                <th>Umur</th>
                <th>Kelamin</th>
                <th>Kontak</th>
                <th>Email</th>
                <th>Alamat</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $guru)
                <tr>
                  <td><img src="/asset/img/profile.png" width="40"></td>
                  <td>{{ $guru->nama }}</td>
                  <td>{{ $guru->umur }}</td>
                  <td>{{ $guru->kelamin }}</td>
                  <td>{{ $guru->kontak ?? '-' }}</td>
                  <td>{{ $guru->email }}</td>
                  <td>{{ $guru->alamat }}</td>
                  <td class="text-center">
                    <a class="btn btn-sm btn-success" href="#" data-toggle="modal"
                      data-target="#edit-{{ $guru->nrp }}"><i class="fa fa-user-edit"></i> update</a>
                    <a class="btn btn-sm btn-danger" href="#" data-toggle="modal"
                      data-target="#delete-{{ $guru->nrp }}"><i class="fa fa-trash-alt"></i> delete</a>
                  </td>
                </tr>

                {{-- Edit Modal --}}
                <div id="edit-{{ $guru->nrp }}" class="modal animated rubberBand delete-modal" role="dialog">
                  <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                      <div class="modal-body text-center">
                        <form action="/teacher/update" method="POST">
                          @csrf
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="card-header">
                                  <h5><img src="/asset/img/profile.png" width="40"> {{ $guru->nama }}</h5>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label class="float-left">NRP</label>
                                      <input type="text" class="form-control" name="nrp"
                                        value="{{ $guru->nrp }}" placeholder="NRP">
                                    </div>
                                  </div>
                                  <div class="col-md-3">

                                    <div class="form-group">
                                      <label class="float-left">Nama</label>
                                      <input type="text" class="form-control" name="nama"
                                        value="{{ $guru->nama }}" placeholder="Nama">
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label class="float-left">Umur</label>
                                      <input type="text" class="form-control" name="umur"
                                        value="{{ $guru->umur }}" placeholder="Umur">
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label class="float-left">Kelamin</label>
                                      <select class="form-control" name="kelamin">
                                        @if ($guru->kelamin == 'Perempuan')
                                          <option selected value="Perempuan">Perempuan</option>
                                          <option value="Laki-Laki">Laki-Laki</option>
                                        @else
                                          <option value="Perempuan">Perempuan</option>
                                          <option selected evalue="Laki-Laki">Laki-Laki</option>
                                        @endif
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label class="float-left">Kontak</label>
                                      <input type="text" class="form-control" name="kontak"
                                        value="{{ $guru->kontak }}" placeholder="Kontak">
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label class="float-left">Email</label>
                                      <input type="text" class="form-control" name="email"
                                        value="{{ $guru->email }}" placeholder="Email">
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label class="float-left">Alamat</label>
                                      <textarea class="form-control" name="alamat">{{ $guru->alamat }}</textarea>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label class="float-left">Upload Profile</label>
                                      <div class="input-group">
                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" name="profile"
                                            id="exampleInputFile">
                                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <a href="#" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-info">Save Changes</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                {{-- Delete Modal --}}
                <div id="delete-{{ $guru->nrp }}" class="modal animated rubberBand delete-modal" role="dialog">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-body text-center">
                        <img src="../asset/img/sent.png" alt="" width="50" height="46">
                        <h3>Apakah Kamu Ingin Menghapus Data Murid Ini?</h3>
                        <div class="m-t-20">
                          <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                          <a href="/teacher/delete/{{ $guru->nrp }}" class="btn btn-danger">Delete</a>
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
    </div>
  </section>
@endsection


@section('content-b')
  <div id="add" class="modal animated rubberBand delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-body text-center">
          <form action="/teacher/add" method="POST">
            @csrf
            <div class="card-body">

              <div class="row">
                <div class="col-md-12">
                  <div class="card-header">
                    <h5><img src="/asset/img/profile.png" width="40">Menambahkan Guru Baru</h5>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="float-left">NRP</label>
                        <input type="text" class="form-control" name="nrp" placeholder="NRP">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="float-left">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="float-left">Umur</label>
                        <input type="text" class="form-control" name="umur" placeholder="Umur">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="float-left">Kelamin</label>
                        <select class="form-control" name="kelamin">
                          <option selected value="Perempuan">Perempuan</option>
                          <option value="Laki-Laki">Laki-Laki</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="float-left">Kontak</label>
                        <input type="text" class="form-control" name="kontak" placeholder="Kontak">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="float-left">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Email">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="float-left">Alamat</label>
                        <textarea class="form-control" name="alamat"></textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="float-left">Upload Profile</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="profile" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <a href="#" class="btn btn-danger" data-dismiss="modal">Cancel</a>
              <button type="submit" class="btn btn-success">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- jQuery -->
  <script src="../asset/jquery/jquery.min.js"></script>
  <script src="../asset/js/bootstrap.bundle.min.js"></script>
  <script src="../asset/js/adminlte.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="../asset/tables/datatables/jquery.dataTables.min.js"></script>
  <script src="../asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../asset/tables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../asset/tables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script>
    $(function() {
      $("#example1").DataTable();
    });
  </script>
@endsection
