<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sinora | {{ $title }}</title>

  <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('') }}plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('') }}plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('') }}dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="{{ route('notulen') }}" class="h1"><b>Notulen</b> Login</a>
      </div>
      <div class="card-body">
        <p class="text-center">Masukan email dan password Anda.</p>

        @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            {!! session('success') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        @if (session('info'))
          <div class="alert alert-info alert-dismissible fade show mt-2" role="alert">
            {!! session('info') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        @if (session('danger'))
          <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
            {!! session('danger') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif

        <form action="#" method="post">
          @csrf
          <div class="input-group mb-3">
            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
              placeholder="Email" value="{{ old('email') }}" required autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="input-group mb-3">
            <input name="password" type="password" class="form-control" placeholder="Password" required
              autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-12 mt-3">
              <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        {{-- <p class="mb-0">
          <a href="register.html" class="text-center">Register a new membership</a>
        </p> --}}
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="{{ asset('') }}plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('') }}dist/js/adminlte.min.js"></script>
</body>

</html>
