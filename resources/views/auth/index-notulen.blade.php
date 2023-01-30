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
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet"
    href="{{ asset('') }}plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('') }}plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('') }}plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('') }}dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('') }}plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('') }}plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('') }}plugins/summernote/summernote-bs4.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('') }}plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('') }}plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('') }}plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    {{-- <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Administrator</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">|</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#"
            class="nav-link">{{ Carbon\Carbon::createFromDate(date('Y-m-d'))->translatedFormat('l, d F Y') }} — <span
              id="jam"></span></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
            role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>

      <script type="text/javascript">
        window.onload = function() {
          jam();
        }

        function jam() {
          var e = document.getElementById('jam'),
            d = new Date(),
            h, m, s;
          h = d.getHours();
          m = set(d.getMinutes());
          s = set(d.getSeconds());

          if (h < 10) {
            h = '0' + h;
          }

          e.innerHTML = h + ':' + m + ':' + s;

          setTimeout('jam()', 1000);
        }

        function set(e) {
          e = e < 10 ? '0' + e : e;
          return e;
        }
      </script>
    </nav> --}}
    <!-- /.navbar -->

    <div>
      <!-- Main content -->
      <div class="row justify-content-center">
        <div class="col-md-12 px-md-5 py-4">

          <div class="d-flex justify-content-between">
            <form action="{{ route('notulen.logout') }}" method="post">
              @csrf
              <button type="submit" class="btn btn-secondary mb-3">LOGOUT</button>
            </form>
            <div class="d-flex">
              <label>KODE RAPAT : &nbsp;</label>
              <input style="width: 113px;" class="form-control font-weight-bold" type="text"
                value="{{ $rapat->kode }}" id="text-copy" readonly>
              <button onclick="copyText()" type="button" class="btn btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-clipboard-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd"
                    d="M10 1.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1Zm-5 0A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5v1A1.5 1.5 0 0 1 9.5 4h-3A1.5 1.5 0 0 1 5 2.5v-1Zm-2 0h1v1A2.5 2.5 0 0 0 6.5 5h3A2.5 2.5 0 0 0 12 2.5v-1h1a2 2 0 0 1 2 2V14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3.5a2 2 0 0 1 2-2Z">
                  </path>
                </svg>
              </button>
            </div>
          </div>

          @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
          @if (session('info'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
              {{ session('info') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif


          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title font-weight-bold">
                {{ $rapat->jenis_rapat->nama }}
              </h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
              <form action="{{ route('save.notulen', $rapat->id) }}" method="POST">
                @csrf
                <div class="row">
                  <div class="col-md-5">
                    <table>
                      <tr>
                        <td>Agenda</td>
                        <td class="text-right" style="width: 40px;">:</td>
                        <td><input style="width: 350px;" type="text" class="ml-2 form-control font-weight-bold"
                            value="{{ $rapat->nama }}">
                      </tr>
                      <tr>
                        <td>Pimpinan Rapat</td>
                        <td class="text-right" style="width: 40px;">:</td>
                        <td><input style="width: 350px;" type="text" class="ml-2 form-control font-weight-bold"
                            value="{{ $rapat->pimpinan_rapat }}">
                      </tr>
                      <tr>
                        <td>Pengisi Rapat</td>
                        <td class="text-right" style="width: 40px;">:</td>
                        <td><input style="width: 350px;" type="text" class="ml-2 form-control font-weight-bold"
                            value="{{ $rapat->pengisi_rapat }}">
                      </tr>
                      <tr>
                        <td>Jumlah Peserta</td>
                        <td class="text-right" style="width: 40px;">:</td>
                        <td><input style="width: 350px;" type="text" class="ml-2 form-control font-weight-bold"
                            value="@if ($jumlahPeserta == 0) - @else{{ $jumlahPeserta }} orang @endif"
                            readonly>
                      </tr>
                    </table>
                  </div>
                  <div class="col-md-4">
                    <table>
                      <tr>
                        <td>Hari, tanggal</td>
                        <td class="text-right" style="width: 40px;">:</td>
                        <td><input type="text" class="ml-2 form-control font-weight-bold"
                            value="{{ Carbon\Carbon::createFromDate($rapat->tanggal)->translatedFormat('l, jS F Y') }}"
                            readonly>
                        </td>
                      </tr>
                      <tr>
                        <td>Waktu</td>
                        <td class="text-right" style="width: 40px;">:</td>
                        <td><input type="text" class="ml-2 form-control font-weight-bold"
                            value="{{ $rapat->mulai }} - {{ $rapat->selesai }} WITA" readonly></td>
                      </tr>
                      <tr>
                        <td>Ruang Rapat</td>
                        <td class="text-right" style="width: 40px;">:</td>
                        <td><input type="text" class="ml-2 form-control font-weight-bold"
                            value="{{ ucfirst($rapat->ruang) }}" readonly></td>
                      </tr>
                      <tr>
                        <td>Status</td>
                        <td class="text-right" style="width: 40px;">:</td>
                        <td><input type="text" class="ml-2 form-control font-weight-bold"
                            value="{{ ucfirst($rapat->status) }}" readonly></td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-md-3">
                    <table>
                      <tr>
                        <td>Notulis</td>
                        <td class="text-right" style="width: 40px;">:</td>
                        <td><input value="{{ old('notulis', $notulen->notulis) }}" type="text" name="notulis"
                            class="ml-2 form-control font-weight-bold" required></td>
                      </tr>
                      <tr>
                        <td>NIP</td>
                        <td class="text-right" style="width: 40px;">:</td>
                        <td><input value="{{ old('nip', $notulen->nip) }}" type="text" name="nip"
                            class="ml-2 form-control font-weight-bold" required></td>
                      </tr>
                      <tr>
                        <td>Pangkat / Jabatan</td>
                        <td class="text-right" style="width: 40px;">:</td>
                        <td><input value="{{ old('jabatan', $notulen->jabatan) }}" type="text" name="jabatan"
                            class="ml-2 form-control font-weight-bold" required></td>
                      </tr>
                      <tr>
                        <td>Divisi</td>
                        <td class="text-right" style="width: 40px;">:</td>
                        <td><input value="{{ old('divisi', $notulen->divisi) }}" type="text" name="divisi"
                            class="ml-2 form-control font-weight-bold" required></td>
                      </tr>
                    </table>
                  </div>
                </div>

                <hr class="bg-secondary my-4">

                <textarea required id="summernote" name="pembahasan">{{ old('pembahasan', $notulen->pembahasan) }}</textarea>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary text-center">Simpan Perubahan</button>
                </div>
              </form>
            </div>

            <div class="card-footer">
              <form action="{{ route('akhiri.rapat') }}" method="POST">
                @csrf
                <input type="hidden" name="rapat_id" value="{{ $notulen->rapat_id }}">
                <button class="btn btn-danger d-block mb-2">Akhiri Rapat</button>
              </form>
              Copyright &copy; {{ date('Y') }} <a href="{{ route('notulen') }}">Notulensi BKKBN
                Sultra</a>.
              All rights reserved.
            </div>
          </div>


        </div>
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{ asset('') }}plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('') }}dist/js/adminlte.min.js"></script>
  <!-- Summernote -->
  <script src="{{ asset('') }}plugins/summernote/summernote-bs4.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="{{ asset('') }}plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ asset('') }}plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{ asset('') }}plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="{{ asset('') }}plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="{{ asset('') }}plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="{{ asset('') }}plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="{{ asset('') }}plugins/jszip/jszip.min.js"></script>
  <script src="{{ asset('') }}plugins/pdfmake/pdfmake.min.js"></script>
  <script src="{{ asset('') }}plugins/pdfmake/vfs_fonts.js"></script>
  <script src="{{ asset('') }}plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="{{ asset('') }}plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="{{ asset('') }}plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  {{-- EDITORS --}}
  <!-- Summernote -->
  <script src="{{ asset('') }}plugins/summernote/summernote-bs4.min.js"></script>
  <!-- CodeMirror -->
  <script src="{{ asset('') }}plugins/codemirror/codemirror.js"></script>
  <script src="{{ asset('') }}plugins/codemirror/mode/css/css.js"></script>
  <script src="{{ asset('') }}plugins/codemirror/mode/xml/xml.js"></script>
  <script src="{{ asset('') }}plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- Page specific script -->
  <script>
    $(function() {
      // Summernote
      $('#summernote').summernote()

      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
  </script>
</body>

</html>
