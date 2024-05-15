@extends('layouts.layout')

@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><img src="../asset/img/dashboard.png" width="40"> Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-1 md:gap-2">
        <div class="info-box ">
          <span class="info-box-icon text-success elevation-4"><img src="/asset/img/student.png" width="50"></span>

          <div class="info-box-content">
            <span class="info-box-text">
              <h5>Jumlah Murid</h5>
            </span>
            <span class="info-box-number">
              <h2>{{ $countMurid }}</h2>
            </span>
          </div>
        </div>
        <div class="info-box">
          <span class="info-box-icon text-info elevation-4"><img src="/asset/img/student.png" width="50"></span>

          <div class="info-box-content">
            <span class="info-box-text">
              <h5>Jumlah Guru</h5>
            </span>
            <span class="info-box-number">
              <h2>{{ $countGuru }}</h2>
            </span>
          </div>
        </div>
        <div class="info-box">
          <span class="info-box-icon text-info elevation-4"><img src="/asset/img/criteria.png" width="50"></span>

          <div class="info-box-content">
            <span class="info-box-text">
              <h5>Jumlah Mapel</h5>
            </span>
            <span class="info-box-number">
              <h2>{{ $countMapel }}</h2>
            </span>
          </div>
        </div>
        <div class="info-box">
          <span class="info-box-icon text-info elevation-4"><img src="/asset/img/report.png" width="50"></span>

          <div class="info-box-content">
            <span class="info-box-text">
              <h5>Jumlah Kelas</h5>
            </span>
            <span class="info-box-number">
              <h2>{{ $countKelas }}</h2>
            </span>
          </div>
        </div>


      </div>
    </div>
  </section>

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><img src="../asset/img/report.png" width="40"> Score Reports</h1>
        </div>
        {{-- <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Score</li>
          </ol>
        </div><br>
        <a class="btn btn-sm btn-info elevation-4" href="#" data-toggle="modal" data-target="#add"
          style="margin-left: 7px;"><i class="fa fa-plus-square"></i>
          Add New</a> --}}
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <div class="info-box">
            <div class="col-md-12">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8 offset-md-2">
                    <p class="text-center">
                      <strong>Attendance</strong>
                    </p>
                    <div class="chart-responsive">
                      <canvas id="donutChart" height="150"></canvas>
                    </div>
                    <!-- ./chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-8 offset-md-4">
                    <ul class="chart-legend clearfix">
                      <li><i class="far fa-circle text-danger"></i> 30% Present</li>
                      <li><i class="far fa-circle text-success"></i> 30% Tardy</li>
                      <li><i class="far fa-circle text-warning"></i> 25% Excude</li>
                      <li><i class="far fa-circle text-info"></i> 15% Unexcuse</li>
                    </ul>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="info-box">
            <div class="col-md-12">
              <p class="text-center">
                <strong>Grade by Subject</strong>
              </p>

              <div class="progress-group">
                Math
                <span class="float-right"><b>70</b>/100</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-primary" style="width: 70%"></div>
                </div>
              </div>
              <!-- /.progress-group -->

              <div class="progress-group">
                Biology
                <span class="float-right"><b>60</b>/100</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-danger" style="width: 60%"></div>
                </div>
              </div>

              <!-- /.progress-group -->
              <div class="progress-group">
                Literature
                <span class="float-right"><b>65</b>/100</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-success" style="width: 65%"></div>
                </div>
              </div>
              <!-- /.progress-group -->
              <div class="progress-group">
                History
                <span class="float-right"><b>60</b>/100</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-info" style="width: 60%"></div>
                </div>
              </div>
              <!-- /.progress-group -->
              <div class="progress-group">
                Art
                <span class="float-right"><b>50</b>/100</span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-warning" style="width: 50%"></div>
                </div>
              </div>
              <!-- /.progress-group -->
              <div class="progress-group">
                English
                <span class="float-right"><b>55</b>/100</span>
                <div class="progress progress-lg">
                  <div class="progress-bar bg-primary" style="width: 55%;"></div>
                </div>
              </div>
              <!-- /.progress-group -->
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
