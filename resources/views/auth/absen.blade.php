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
        <a href="{{ route('absen') }}" class="h1"><b>Absensi</b> Rapat</a>
      </div>
      <div class="card-body">
        <p class="text-center">Isi data Anda untuk melakukan presensi.</p>

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

        <form action="{{ route('process.absen') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="nama">Kode Rapat</label>
            <input name="kode" type="text" class="form-control" id="nama" required
              value="{{ old('kode') }}">
          </div>
          <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input name="nama" type="text" class="form-control" id="nama" required
              value="{{ old('nama') }}">
          </div>
          <div class="form-group">
            <label for="nip">NIP</label>
            <input name="nip" type="text" class="form-control" id="nip" required
              value="{{ old('nip') }}" maxlength="18">
          </div>
          <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input name="jabatan" type="text" class="form-control" id="jabatan" required
              value="{{ old('jabatan') }}">
          </div>

          @php
            $keterangan = ['Hadir', 'Tidak Hadir', 'Sakit', 'Perjalanan Dinas', 'Diluar Kota'];
          @endphp
          <label>Keterangan</label>
          <div class="d-flex flex-wrap">
            @foreach ($keterangan as $item)
              <div class="form-check mr-3">
                <input @if (old('keterangan') == $item) checked @endif class="form-check-input" type="radio"
                  name="keterangan" id="{{ $item }}" value="{{ $item }}">
                <label class="form-check-label" for="{{ $item }}">
                  {{ $item }}
                </label>
              </div>
            @endforeach
          </div>

          <div class="form-group mt-2">
            <input name="keterangan_lain" type="text" class="form-control" id="keterangan_lain"
              value="{{ old('keterangan_lain') }}" placeholder="Lainnya ...">

            @error('keterangan')
              <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
            @error('keterangan_lain')
              <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-primary">ABSEN</button>
          </div>
        </form>

        {{-- <form action="{{ route('login.proses.absen') }}" method="post">
          @csrf
          <div class="input-group mb-3">
            <input name="nip" type="text" class="form-control" placeholder="NIP" value="{{ old('nip') }}"
              required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="password" type="password" class="form-control" placeholder="Password" required>
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
        </form> --}}

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
