<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sinora | {{ $title }}</title>

  {{-- ALERT NOTIFICATION --}}
  <link rel="stylesheet" href="{{ asset('') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('') }}/plugins/toastr/toastr.min.css">

  <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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

    <div style="overflow: hidden;" class="mx-2">
      <!-- Main content -->
      <div class="row justify-content-center">
        <div class="col-md-12 px-md-5 py-4">

          <div class="d-flex justify-content-md-start justify-content-between mb-4">
            <form action="{{ route('notulen.logout') }}" method="post" class="mr-md-4 mr-0">
              @csrf
              <button type="submit" class="btn btn-secondary">LOGOUT</button>
            </form>

            <script>
              function copyText() {
                var copyText = document.getElementById("text-copy");
                copyText.select();
                document.execCommand("copy");
              }
            </script>

            <div>
              <h6 class="font-weight-bold d-inline">KODE RAPAT : &nbsp;</h6>
              <input readonly style="width: 113px;" class="form-control form-control-sm font-weight-bold d-inline"
                type="text" value="{{ $rapat->kode }}" id="text-copy" readonly>
              <button onclick="copyText()" type="button" class="btn btn-secondary d-inline" style="margin-top: -4px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-clipboard-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd"
                    d="M10 1.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1Zm-5 0A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5v1A1.5 1.5 0 0 1 9.5 4h-3A1.5 1.5 0 0 1 5 2.5v-1Zm-2 0h1v1A2.5 2.5 0 0 0 6.5 5h3A2.5 2.5 0 0 0 12 2.5v-1h1a2 2 0 0 1 2 2V14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3.5a2 2 0 0 1 2-2Z">
                  </path>
                </svg>
              </button>
            </div>
          </div>

          {{-- TOAST ALERT --}}
          @if (session('success'))
            <button id="modal" type="button" style="display: none;"
              class="btn btn-success toastrDefaultSuccess"></button>
          @elseif(session('danger'))
            <button id="modal" type="button" style="display: none;"
              class="btn btn-success toastrDefaultError"></button>
          @elseif(session('successPassword'))
            <button id="modal" type="button" style="display: none;"
              class="btn btn-success toastrDefaultSuccessPassword"></button>
          @endif

          {{-- @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
              {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
          <script>
            setTimeout(function() {
              $('#alert').fadeOut('fast');
            }, 1500);
          </script> --}}

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
                  <div class="col-md-7">
                    <div class="row align-items-center">
                      <div class="col-md-3">
                        <h6>Agenda</h6>
                      </div>
                      <div class="col-md-9 mb-2">
                        <input name="nama" type="text" class="form-control form-control-sm font-weight-bold"
                          value="{{ $rapat->nama }}">
                      </div>
                      <div class="col-md-3">
                        <h6>Pimpinan Rapat</h6>
                      </div>
                      <div class="col-md-9 mb-2">
                        <input name="pimpinan_rapat" type="text"
                          class="form-control form-control-sm font-weight-bold" value="{{ $rapat->pimpinan_rapat }}">
                      </div>
                      <div class="col-md-3">
                        <h6>Pengisi Rapat</h6>
                      </div>
                      <div class="col-md-9 mb-2">
                        <input name="pengisi_rapat" type="text"
                          class="form-control form-control-sm font-weight-bold" value="{{ $rapat->pengisi_rapat }}">
                      </div>
                      <div class="col-md-3">
                        <h6>Peserta Rapat</h6>
                      </div>
                      <div class="col-md-9 mb-2">
                        <input readonly type="text" class="form-control form-control-sm font-weight-bold"
                          value="{{ $jumlahPeserta . ' orang' ?? '-' }}">
                      </div>
                      <div class="col-md-3">
                        <h6>Ruang Rapat</h6>
                      </div>
                      <div class="col-md-9 mb-2">
                        <input name="ruang" type="text" class="form-control form-control-sm font-weight-bold"
                          value="{{ $rapat->ruang }}">
                      </div>
                      <div class="col-md-3">
                        <h6>Status</h6>
                      </div>
                      <div class="col-md-9 mb-2">
                        <input readonly type="text" class="form-control form-control-sm font-weight-bold"
                          value="{{ ucfirst($rapat->status) }}">
                      </div>
                    </div>

                  </div>
                  <div class="col-md-5 pl-2 pl-md-5">
                    <div class="row align-items-center">
                      <div class="col-md-4">
                        <h6>Hari, tanggal</h6>
                      </div>
                      <div class="col-md-8 mb-2">
                        <input readonly type="text" class="form-control form-control-sm font-weight-bold"
                          value="{{ Carbon\Carbon::createFromDate($rapat->tanggal)->translatedFormat('l, jS F Y') }}">
                      </div>
                      <div class="col-md-4">
                        <h6>Waktu</h6>
                      </div>
                      <div class="col-md-8 mb-2">
                        <input readonly type="text" class="form-control form-control-sm font-weight-bold"
                          value="{{ $rapat->mulai }} - {{ $rapat->selesaii }} WTIA">
                      </div>
                      <div class="col-md-4">
                        <h6>Notulis</h6>
                      </div>
                      <div class="col-md-8 mb-2">
                        <input name="notulis" type="text" class="form-control form-control-sm font-weight-bold"
                          value="{{ $rapat->notulen->notulis }}">
                      </div>
                      <div class="col-md-4">
                        <h6>NIP</h6>
                      </div>
                      <div class="col-md-8 mb-2">
                        <input name="nip" type="text" class="form-control form-control-sm font-weight-bold"
                          value="{{ $rapat->notulen->nip }}">
                      </div>
                      <div class="col-md-4">
                        <h6>Pangkat</h6>
                      </div>
                      <div class="col-md-8 mb-2">
                        <input name="pangkat" type="text" class="form-control form-control-sm font-weight-bold"
                          value="{{ $rapat->notulen->pangkat }}">
                      </div>
                      <div class="col-md-4">
                        <h6>Jabatan</h6>
                      </div>
                      <div class="col-md-8 mb-2">
                        <input name="jabatan" type="text" class="form-control form-control-sm font-weight-bold"
                          value="{{ $rapat->notulen->jabatan }}">
                      </div>
                    </div>

                  </div>

                </div>

                <hr class="bg-secondary my-4">

                <textarea required id="summernote" name="pembahasan">{{ old('pembahasan', $notulen->pembahasan) }}</textarea>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary text-center">Simpan Perubahan</button>
                </div>
              </form>
            </div>

            <div class="card-footer text-center">
              <p>Tekan tombol dibawah untuk mengakhiri rapat.</p>
              <form action="{{ route('akhiri.rapat') }}" method="POST">
                @csrf
                <input readonly type="hidden" name="rapat_id" value="{{ $notulen->rapat_id }}">
                <input readonly type="hidden" name="notulen_id" value="{{ $notulen->id }}">
                <button class="btn btn-danger d-block mb-3 mx-auto">Akhiri Rapat</button>
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

  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}

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
      $('#summernote').summernote({
        height: 269,
        toolbar: [
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strikethrough', 'superscript', 'subscript']],
          // ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          // ['height', ['height']]
        ]
      })

      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
  </script>

  {{-- ALERT NOTIFICATION --}}
  <script src="{{ asset('') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="{{ asset('') }}/plugins/toastr/toastr.min.js"></script>

  <script>
    setTimeout(function() {
      document.getElementById("modal").click();
    }, 100);

    $(function() {
      $('.toastrDefaultSuccess').click(function() {
        toastr.success("{{ session('success') }}")
      });
      $('.toastrDefaultSuccessPassword').click(function() {
        toastr.success("{{ session('successPassword') }}")
      });
      $('.toastrDefaultInfo').click(function() {
        toastr.info("{{ session('info') }}")
      });
      $('.toastrDefaultError').click(function() {
        toastr.error("{{ session('danger') }}")
      });
      $('.toastrDefaultErrorr').click(function() {
        toastr.error('Konfirmasi password salah.')
      });
      $('.toastrDefaultWarning').click(function() {
        toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
      });
    });
  </script>
</body>

</html>
