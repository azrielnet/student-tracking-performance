@extends('layouts.layout')

@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><img src="../asset/img/score.png" width="40"> Lihat Absensi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Score</li>
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
          <table id="example1" class="table table-hover">
            <thead>
              <tr>
                <th>Nama Murid</th>
                <th>Tahun Sekolah</th>
                <th>Subject</th>
                <th>Criteria</th>
                <th>Kehadiran</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $d)
                @php
                  $nisn = $d['murid']['nisn'];
                @endphp
                <tr>
                  <td>{{ $d['murid']['nama'] }}</td>
                  <td>{{ $d['murid']['tahun_sekolah'] }}</td>
                  <td>{{ $d['absensi']['subject'] }}</td>
                  <td>{{ $d['absensi']['criteria'] }}</td>
                  <td>{{ $d['absensi']['kehadiran'] }}</td>
                  <td class="text-center">
                    <a class="btn btn-sm btn-success" h ref="#" data-toggle="modal"
                      data-target="#edit-{{ $nisn }}"><i class="fa fa-edit"></i> update</a>
                    <a class="btn btn-sm btn-danger" href="#" data-toggle="modal"
                      data-target="#delete-{{ $nisn }}"><i class="fa fa-trash-alt"></i> delete</a>
                  </td>
                </tr>

                {{-- Edit Modal --}}
                <div id="edit-{{ $nisn }}" class="modal animated rubberBand delete-modal" role="dialog">
                  <div class="modal-dialog modal-dialog-centered modal-md">
                    <div class="modal-content">
                      <div class="modal-body text-center">
                        <form action="/attendance/update" method="POST">
                          @csrf
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="card-header">
                                  <h5><img src="../asset/img/score.png" width="40">{{ $d['murid']['nama'] }}</h5>
                                </div>
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <input type="text" name="nisn" value="{{ $nisn }}" hidden>
                                      <label class="float-left">Subject</label>
                                      <input type="text" class="form-control" name="subject"
                                        value="{{ $d['absensi']['subject'] }}" placeholder="Subject">
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label class="float-left">Criteria</label>
                                      <input type="text" class="form-control" name="criteria"
                                        value="{{ $d['absensi']['criteria'] }}" placeholder="Criteria">
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label class="float-left">Kehadiran</label>
                                      <input type="text" class="form-control" name="kehadiran"
                                        value="{{ $d['absensi']['kehadiran'] }}" placeholder="Kehadiran">
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
                <div id="delete-{{ $nisn }}" class="modal animated rubberBand delete-modal" role="dialog">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-body text-center">
                        <img src="../asset/img/profile.png" alt="" width="50" height="46">
                        <h3>Apakah Kamu Ingin Menghapus Nilai Ini?</h3>
                        <div class="m-t-20">
                          <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                          <a href="/attendance/delete/{{ $nisn }}" class="btn btn-danger">Delete</a>
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
    <div class="modal-dialog modal-dialog-centered modal-md">
      <div class="modal-content">
        <div class="modal-body text-center">
          <form action="/attendance/add" method="POST">
            @csrf
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="card-header">
                    <h5><img src="../asset/img/score.png" width="40">Menambah Absensi Baru</h5>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="float-left">Nama Murid</label>
                        <input type="text" class="form-control" id="score_murid" placeholder="Nama Murid" />
                        <input type="text" name="nisn" id="nisn" hidden>
                        <div id="sugest_box" class="shadow-lg bg-white absolute w-full z-10">
                          @foreach ($dataMurid as $d)
                            <a href="#" id="{{ $d->nisn }}"
                              class="hidden py-3 text-start px-2 border-b-2">[{{ $d->nisn }}]
                              {{ $d->nama }}</a>
                          @endforeach
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="float-left">Subject</label>
                        <input type="text" class="form-control" name="subject" placeholder="Subject">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="float-left">Criteria</label>
                        <input type="text" class="form-control" name="criteria"
                          placeholder="Criteria">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="float-left">Kehadiran</label>
                        <input type="text" class="form-control" name="kehadiran" placeholder="Kehadiran">
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
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const score_murid = document.getElementById('score_murid');
      const nisn = document.getElementById('nisn');
      const sugest_box = document.getElementById('sugest_box');

      const muridNames = [];
      sugest_box.querySelectorAll('a').forEach((element) => {
        muridNames.push(element.innerText);
      });
      score_murid.addEventListener('input', (e) => {
        const value = e.target.value;
        const result = muridNames.filter((name) => name.includes(value)).slice(0, 5);
        sugest_box.querySelectorAll('a').forEach((element) => {
          if (result.includes(element.innerText)) {
            element.classList.add('block');
            element.classList.remove('hidden');
          } else {
            element.classList.remove('block');
            element.classList.add('hidden');
          }
          element.addEventListener('click', () => {
            score_murid.value = element.innerText.trim();
            nisn.value = element.getAttribute('id');

            sugest_box.querySelectorAll('a').forEach((element2) => {
              element2.classList.remove('block');
              element2.classList.add('hidden');
            });

          })
        });
      });
    });
  </script>
@endsection
