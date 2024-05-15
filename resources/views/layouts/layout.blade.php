<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Tracking Performance System</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('asset/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">

  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-light" style="background-color: rgb(27,100,107)">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link flex items-center p-0 px-2" data-widget="pushmenu" href="#" role="button"><i
              class="fas fa-bars"></i></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link flex items-center p-0 px-2" href="#" role="button">
            <img src="/asset/img/avatar.png" class="img-circle" alt="User Image" width="40"
              style="margin-top: -8px;" alt="Logo Profil" id="profileLogo">
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link flex items-center p-0 px-2" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link flex items-center p-0 px-2" href="/login/logout">
            <i class="fas fa-sign-out-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary">
      <!-- Brand Logo -->
      <a href="/" class="brand-link">
        <img src="/asset/img/logo.png" alt="DSMS Logo" width="200">
      </a>
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item">
              <a href="/" class="nav-link flex items-center p-0 px-2">
                <img src="/asset/img/dashboard.png" width="30">
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link flex items-center p-0 px-2">
                <img src="/asset/img/report.png" width="30">
                <p>
                  Data Kelas
                </p>
                <i class="right fas fa-angle-left"></i>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/grade" class="nav-link flex items-center p-0 px-4">
                    <img src="/asset/img/grade.png" width="30">
                    <p>
                      Data Kelas
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/student" class="nav-link flex items-center p-0 px-4">
                    <img src="/asset/img/student.png" width="30">
                    <p>
                      Data Siswa
                    </p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="/score" class="nav-link flex items-center p-0 px-2">
                <img src="/asset/img/score.png" width="30">
                <p>
                  Lihat Nilai
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/attendance" class="nav-link flex items-center p-0 px-2">
                <img src="/asset/img/score.png" width="30">
                <p>
                  Lihat Absensi
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/teacher" class="nav-link flex items-center p-0 px-2">
                <img src="/asset/img/student.png" width="30">
                <p>
                  Data Guru
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/criteria" class="nav-link flex items-center p-0 px-2">
                <img src="/asset/img/criteria.png" width="30">
                <p>
                  Mata pelajaran
                </p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <div class="content-wrapper">

      {{-- CONTENT --}}
      @yield('content')
    </div>
  </div>


  <div id="profilePopup" class="popup">
    <div class="popup-content">
      <span class="close" onclick="closePopup()">&times;</span>
      <h2>Biodata {{ Auth::user()->as }}</h2>
      <p>Nama: {{ Auth::user()->name }}</p>
      <p>Email: {{ Auth::user()->email }}</p>
      <!-- Informasi biodata lainnya -->
    </div>
  </div>
  <!-- jQuery -->
  @yield('content-b')
  <script src="{{ asset('asset/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('asset/js/adminlte.js') }}"></script>
  <script src="{{ asset('script.js') }}"></script>
</body>

</html>
