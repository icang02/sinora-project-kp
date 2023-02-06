<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sinora | <?= $title ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="{{ asset('img/favicon.ico') }}" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('login-notulen') }}/vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css"
    href="{{ asset('login-notulen') }}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css"
    href="{{ asset('login-notulen') }}/fonts/iconic/css/material-design-iconic-font.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('login-notulen') }}/vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('login-notulen') }}/vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('login-notulen') }}/vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('login-notulen') }}/vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('login-notulen') }}/vendor/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('login-notulen') }}/css/util.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('login-notulen') }}/css/main.css">
  <!--===============================================================================================-->
</head>

<body>

  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <form class="login100-form validate-form" action="{{ route('check.kode') }}" method="post">
          {{ csrf_field() }}
          <span class="login100-form-title p-b-26">
            Login Notulen
          </span>
          <span class="login100-form-title p-b-48">
            {{-- <i class="zmdi zmdi-font"></i> --}}
            <img src="{{ asset('img/bkkbn.png') }}" class="img-fluid" width="150"> <br>
            <p style="font-size: 0.8rem;">Sulawesi Tenggara</p>
          </span>


          @if (session('success'))
            <div style="margin-bottom: 35px;" class="alert alert-success alert-dismissible fade show" role="alert"
              style="border-radius: 25px;">
              <small>
                {!! session('success') !!}
              </small>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
          @if (session('info'))
            <div style="margin-bottom: 35px;" class="alert alert-info alert-dismissible fade show" role="alert"
              style="border-radius: 25px;">
              <small>
                {!! session('info') !!}
              </small>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
          @if (session('danger'))
            <div style="margin-bottom: 35px;" class="alert alert-danger alert-dismissible fade show" role="alert"
              style="border-radius: 25px;">
              <small>
                {!! session('danger') !!}
              </small>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

          <div class="wrap-input100 validate-input" data-validate="Kode valid: R.xxxx.{{ date('Y') }}">
            <input value="<?= old('kode') ?>" name="kode" class="input100 text-uppercase" type="text"
              name="text" autocomplete="off" maxlength="11" active @if (session('danger') || session('info'))
            autofocus
            @endif>
            <span class="focus-input100" data-placeholder="Kode Rapat"></span>
          </div>

          {{-- <div class="wrap-input100 validate-input" data-validate="Enter password">
            <span class="btn-show-pass">
              <i class="zmdi zmdi-eye"></i>
            </span>
            <input class="input100" type="password" name="pass">
            <span class="focus-input100" data-placeholder="Password"></span>
          </div> --}}

          <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button class="login100-form-btn">
                Mulai
              </button>
            </div>
          </div>

          <div class="text-center p-t-115">
            <a class="txt2" href="{{ route('dashboard') }}">
              Sistem Informasi Notulensi Rapat
            </a>

            <span class="txt1">
              Perwakilan BKKBN Sulawesi Tenggara
            </span>
          </div>
        </form>
      </div>
    </div>
  </div>


  <div id="dropDownSelect1"></div>

  <!--===============================================================================================-->
  <script src="{{ asset('login-notulen') }}/vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="{{ asset('login-notulen') }}/vendor/animsition/js/animsition.min.js"></script>
  <!--===============================================================================================-->
  <script src="{{ asset('login-notulen') }}/vendor/bootstrap/js/popper.js"></script>
  <script src="{{ asset('login-notulen') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="{{ asset('login-notulen') }}/vendor/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="{{ asset('login-notulen') }}/vendor/daterangepicker/moment.min.js"></script>
  <script src="{{ asset('login-notulen') }}/vendor/daterangepicker/daterangepicker.js"></script>
  <!--===============================================================================================-->
  <script src="{{ asset('login-notulen') }}/vendor/countdowntime/countdowntime.js"></script>
  <!--===============================================================================================-->
  <script src="{{ asset('login-notulen') }}/js/main.js"></script>

</body>

</html>
