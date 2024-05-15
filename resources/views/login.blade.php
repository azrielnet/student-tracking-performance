<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Tracking Performance System</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('asset/fontawesome/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('asset/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-info">
      <div class="card-header text-center">
        <a href="/" class="brand-link flex justify-center">
          <img src="asset/img/logo.png" alt="DSMS Logo" width="200">
        </a>
      </div>
      <div class="card-body">
        @if ($errors->any())
          <h6 class="bg-red-500/90 text-center text-white p-1 mb-2 rounded-lg ring-2 ring-red-800 shadow-md">
            {{ $errors->first() }}</h6>
        @endif
        <form action="/login/post" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="nisn" placeholder="NISN or NRP">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6 offset-lg-3">
              <button type="submit" class="btn btn-info btn-block" style="color: rgb(235,235,235)">Login</button>
            </div>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->
</body>

</html>
