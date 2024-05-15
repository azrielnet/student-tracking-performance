@extends('layouts.layout')

@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><img src="../asset/img/report.png" width="40"> Reports</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Reports</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-md-4 col-lg-4 col-xl-4">
          <div class="card">
            <div class="card-body">
              <div class="chart-title">
                <h4>Compare Score</h4>
              </div>
              <table class="table table-bordered mytable">
                <thead>
                  <th></th>
                  <th>2021-1</th>
                  <th>2021-2</th>
                </thead>
                <tbody>
                  <tr>
                    <td>Quiz</td>
                    <td>80</td>
                    <td>85</td>
                  </tr>
                  <tr>
                    <td>Project</td>
                    <td>90</td>
                    <td>95</td>
                  </tr>
                  <tr>
                    <td>Exam</td>
                    <td>95</td>
                    <td>90</td>
                  </tr>
                  <tr>
                    <td>Attendance</td>
                    <td>95</td>
                    <td>90</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-8 col-lg-8 col-xl-8">
          <div class="card">
            <div class="card-body">
              <div class="chart-title">
                <h4>Graphical Representation of Score</h4><br>
              </div>
              <canvas id="bargraph"></canvas>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-4 col-lg-4 col-xl-4">
          <div class="card">
            <div class="card-body">
              <div class="chart-title">
                <h4>Compare Score</h4>
              </div>
              <table class="table table-bordered mytable">
                <thead>
                  <th></th>
                  <th>2021-1</th>
                  <th>2021-2</th>
                </thead>
                <tbody>
                  <tr>
                    <td>Math</td>
                    <td>80</td>
                    <td>85</td>
                  </tr>
                  <tr>
                    <td>English</td>
                    <td>90</td>
                    <td>95</td>
                  </tr>
                  <tr>
                    <td>History</td>
                    <td>95</td>
                    <td>90</td>
                  </tr>
                  <tr>
                    <td>Science</td>
                    <td>95</td>
                    <td>90</td>
                  </tr>
                  <tr>
                    <td>Programming</td>
                    <td>95</td>
                    <td>90</td>
                  </tr>
                  <tr>
                    <td>PE</td>
                    <td>95</td>
                    <td>90</td>
                  </tr>
                  <tr>
                    <td>Web Design</td>
                    <td>95</td>
                    <td>90</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-8 col-lg-8 col-xl-8">
          <div class="card">
            <div class="card-body">
              <div class="chart-title">
                <h4>Graphical Representation of Score</h4><br>
              </div>
              <canvas id="bargraph1"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('content-b')
  <!-- jQuery -->
  <script src="../asset/jquery/jquery.min.js"></script>
  <script src="../asset/js/adminlte.js"></script>
  <script src="../asset/js/chart.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Bar Chart
      var barChartData = {
        labels: ["Quiz", "Project", "Exam", "Attendance"],
        datasets: [{
            label: '2021-1',
            backgroundColor: 'rgb(79,129,189)',
            borderColor: 'rgba(0, 158, 251, 1)',
            borderWidth: 1,
            data: [80, 90, 95, 95]
          },
          {
            label: '2021-2',
            backgroundColor: 'rgb(192,80,77)',
            borderColor: 'rgba(0, 158, 251, 1)',
            borderWidth: 1,
            data: [85, 95, 90, 90]
          }
        ]
      };

      var ctx = document.getElementById('bargraph').getContext('2d');
      window.myBar = new Chart(ctx, {
        type: 'bar',
        data: barChartData,
        options: {
          responsive: true,
          legend: {
            display: true,
          }
        }
      });

    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Bar Chart
      var barChartData = {
        labels: ["Math", "English", "History", "Science", "Programming", "PE", "Web Design"],
        datasets: [{
            label: '2021-1',
            backgroundColor: 'rgb(79,129,189)',
            borderColor: 'rgba(0, 158, 251, 1)',
            borderWidth: 1,
            data: [80, 90, 95, 95, 90, 100, 90]
          },
          {
            label: '2021-2',
            backgroundColor: 'rgb(192,80,77)',
            borderColor: 'rgba(0, 158, 251, 1)',
            borderWidth: 1,
            data: [85, 95, 90, 90, 90, 100, 85]
          }
        ]
      };

      var ctx = document.getElementById('bargraph1').getContext('2d');
      window.myBar = new Chart(ctx, {
        type: 'bar',
        data: barChartData,
        options: {
          responsive: true,
          legend: {
            display: true,
          }
        }
      });

    });
  </script>
@endsection
