<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sinora | {{ $title }}</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="{{ asset('img/favicon.ico') }}" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('login-user') }}/vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css"
    href="{{ asset('login-user') }}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('login-user') }}/vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('login-user') }}/vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('login-user') }}/vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('login-user') }}/css/util.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('login-user') }}/css/main.css">
  <!--===============================================================================================-->
</head>

<body>

  <div class="limiter" style="background-color: red !important;">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt text-center" data-tilt>
          {{-- <img src="{{ asset('login-user') }}/images/img-01.png" alt="IMG"> --}}
          <img src="{{ asset('img/logo_bkkbn.png') }}" alt="IMG">
          <h6 style="margin-top: -10px; margin-left: 4px; letter-spacing: 6px;">Sulawesi Tenggara</h6>
        </div>

        <form class="login100-form validate-form" action="{{ route('login') }}" method="post">
          @csrf
          <span class="login100-form-title">
            Sinora Login
          </span>

          @if (session('danger'))
            <div id="alert" class="alert alert-danger alert-dismissible fade show mt-2" style="border-radius: 25px;"
              role="alert">
              <small>{!! session('danger') !!}</small>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

          <div class="wrap-input100 validate-input" data-validate="Email yang valid: ex@gmail.com">
            <input value="{{ old('email') }}" name="email" class="input100" type="email" name="email"
              placeholder="Email">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Password wajib diisi">
            <input name="password" autocomplete="off" class="input100" type="password" name="pass"
              placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>

          <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn" style="cursor: pointer;">
              Login
            </button>
          </div>

          <div class="text-center p-t-10">
            <span class="txt1">
              Login sebagai
            </span>
            <a class="txt2" href="{{ route('notulen') }}">
              notulen?
            </a>
            <span class="txt1">
              Atau ke halaman
            </span>
            <a class="txt2" href="{{ route('absen') }}">
              absensi
            </a>
            <span class="txt1">
              rapat.
            </span>
          </div>


          <div class="text-center p-t-136">
            <button class="txt2">
              Sistem Informasi Notulensi Rapat <br>Perwakilan BKKBN Sulawesi Tenggara
              {{-- <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i> --}}
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>




  <!--===============================================================================================-->
  <script src="{{ asset('login-user') }}/vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="{{ asset('login-user') }}/vendor/bootstrap/js/popper.js"></script>
  <script src="{{ asset('login-user') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="{{ asset('login-user') }}/vendor/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="{{ asset('login-user') }}/vendor/tilt/tilt.jquery.min.js"></script>
  <script>
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
  <!--===============================================================================================-->
  <script src="{{ asset('login-user') }}/js/main.js"></script>

</body>

</html>
