@extends('layouts.dashboard')
@section('main-content')
  <style>
    .dt-buttons {
      display: none;
    }
  </style>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <!-- Modal -->
          @can('pegawai')
            {{-- Tambah Peserta Rapat --}}
            <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Peserta Rapat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <form action="{{ route('add.peserta') }}" method="post">
                    <input type="hidden" name="rapat_id" value="{{ $rapat->id }}">
                    <div class="modal-body">
                      @csrf
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


                      <label>Keterangan</label>
                      <div class="d-flex flex-wrap">
                        <div class="form-check mr-3">
                          <input class="form-check-input" type="radio" name="keterangan" id="hadir" value="Hadir">
                          <label class="form-check-label" for="hadir">
                            Hadir
                          </label>
                        </div>
                        <div class="form-check mr-3">
                          <input class="form-check-input" type="radio" name="keterangan" id="tidak_hadir"
                            value="Tidak Hadir">
                          <label class="form-check-label" for="tidak_hadir">
                            Tidak Hadir
                          </label>
                        </div>
                        <div class="form-check mr-3">
                          <input class="form-check-input" type="radio" name="keterangan" id="sakit" value="Sakit">
                          <label class="form-check-label" for="sakit">
                            Sakit
                          </label>
                        </div>
                        <div class="form-check mr-3">
                          <input class="form-check-input" type="radio" name="keterangan" id="perjalanan_dinas"
                            value="Perjalanan Dinas">
                          <label class="form-check-label" for="perjalanan_dinas">
                            Perjalanan Dinas
                          </label>
                        </div>
                        <div class="form-check mr-3">
                          <input class="form-check-input" type="radio" name="keterangan" id="diluar_kota"
                            value="Diluar Kota">
                          <label class="form-check-label" for="diluar_kota">
                            Diluar Kota
                          </label>
                        </div>
                      </div>
                      <div class="form-group mt-2">
                        <input name="keterangan_lain" type="text" class="form-control" id="keterangan_lain"
                          value="{{ old('keterangan_lain') }}" placeholder="Lainnya ...">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Tambah Data</button>
                      <button class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            {{-- Upload Daftar Hadir --}}
            <div class="modal fade" id="modalAbsen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Daftar Hadir Rapat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <form action="{{ route('upload.absen', $rapat->id) }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="rapat_id" value="{{ $rapat->id }}">
                    <div class="modal-body">
                      @csrf
                      <div class="form-group">
                        <label for="file">File Absen</label>
                        <input accept=".pdf,.docx,.doc,.xlsx" name="file" type="file" class="form-control"
                          id="file" required>
                        <div class="text-form text-muted mt-2">Upload file format .doc, .docx, .xlsx, atau .pdf.</div>
                      </div>

                      @if ($rapat->file_absen == null)
                        <button class="btn btn-secondary btn-sm" disabled>Download Absen</button>
                      @else
                        <div>{{ $rapat->file_absen->file_asli }}</div>
                        <a href="{{ route('download.absen', $rapat->file_absen->id) }}"
                          class="btn btn-secondary btn-sm mt-1">Download Absen</a>
                      @endif
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Upload</button>
                      <button class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          @endcan

          {{-- TOAST ALERT --}}
          @if (session('success'))
            <button id="modal" type="button" style="display: none;"
              class="btn btn-success toastrDefaultSuccess"></button>
          @endif
          @if (session('danger'))
            <button id="modal" type="button" style="display: none;"
              class="btn btn-success toastrDefaultError"></button>
          @endif


          @push('script')
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
          @endpush

          <div class="card mt-2">
            <div class="card-header">
              <div class="row">
                <div class="col-md-6 col-12">
                  <h5 class="card-title"><span class="font-weight-bold">{{ $rapat->jenis_rapat->nama }}</span></h5>
                </div>
                <div class="col-md-6 col-12 d-md-flex justify-content-end">
                  <h5 class="card-title">
                    <table class="mt-3 mt-md-0">
                      <tr>
                        <td>
                          <h5 class="card-title">Kode Rapat</h5>
                        </td>
                        <td class="text-center" style="width: 15px;">:</td>
                        <td class="d-flex">
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
                        </td>
                      </tr>
                    </table>
                  </h5>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              {{-- <h6 class="font-weight-bold">{{ $rapat->jenis_rapat->nama }}</h6> --}}
              <div class="row">
                <div class="col-md-6">
                  <table>
                    <tr>
                      <td style="width: 150px;">Agenda Rapat</td>
                      <td style="width: 15px;">:</td>
                      <td class="font-weight-bold">{{ $rapat->nama }}</td>
                    </tr>
                    <tr>
                      <td style="width: 150px;">Pimpinan Rapat</td>
                      <td style="width: 15px;">:</td>
                      <td class="font-weight-bold">{{ $rapat->pimpinan_rapat }}</td>
                    </tr>
                    <tr>
                      <td style="width: 150px;">Pengisi Rapat</td>
                      <td style="width: 15px;">:</td>
                      <td class="font-weight-bold">{{ $rapat->pengisi_rapat }}</td>
                    </tr>
                    <tr>
                      <td style="width: 150px;">Jumlah Peserta</td>
                      <td style="width: 15px;">:</td>
                      <td class="font-weight-bold">
                        {{ $jumlahPeserta < 1 ? '-' : $jumlahPeserta . ' orang' }}
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="col-md-6">
                  <table>
                    <tr>
                      <td style="width: 150px;">Hari, tanggal</td>
                      <td style="width: 15px;">:</td>
                      <td class="font-weight-bold">
                        {{ Carbon\Carbon::createFromDate($rapat->tanggal)->translatedFormat('l, jS F Y') }}</td>
                    </tr>
                    <tr>
                      <td style="width: 150px;">Waktu</td>
                      <td style="width: 15px;">:</td>
                      <td class="font-weight-bold">{{ $rapat->mulai }} - {{ $rapat->selesai }} WITA</td>
                    </tr>
                    <tr>
                      <td style="width: 150px;">Ruang Rapat</td>
                      <td style="width: 15px;">:</td>
                      <td class="font-weight-bold">{{ $rapat->ruang }}</td>
                    </tr>
                    <tr>
                      <td style="width: 150px;">Status</td>
                      <td style="width: 15px;">:</td>
                      <td class="font-weight-bold">{{ ucfirst($rapat->status) }}</td>
                    </tr>
                  </table>
                </div>
              </div>

              <hr class="my-4 border">

              <div class="row mt-3">
                <div class="col-md-6">
                  <h6 class="font-weight-bold card-title">Data Notulen</h6> <br>
                  <table class="mt-2">
                    <tr>
                      <td style="width: 150px;">Notulis</td>
                      <td style="width: 15px;">:</td>
                      <td class="font-weight-bold">
                        {{ isset($rapat->notulen->notulis) ? $rapat->notulen->notulis : '-' }}
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 150px;">NIP</td>
                      <td style="width: 15px;">:</td>
                      <td class="font-weight-bold">{{ isset($rapat->notulen->nip) ? $rapat->notulen->nip : '-' }}</td>
                    </tr>
                    <tr>
                      <td style="width: 150px;">Pangkat</td>
                      <td style="width: 15px;">:</td>
                      <td class="font-weight-bold">
                        @if (isset($rapat->notulen->pangkat) && isset($rapat->notulen->jabatan))
                          {{ $rapat->notulen->pangkat }}
                        @else
                          -
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 150px;">Jabatan</td>
                      <td style="width: 15px;">:</td>
                      <td class="font-weight-bold">{{ $rapat->notulen->jabatan ?? '-' }}</td>
                    </tr>
                  </table>
                </div>
                <div class="col-md-6">
                  <h6 class="font-weight-bold card-title">Action</h6> <br>
                  <div class="mt-2">
                    @can('pegawai')
                      <a href="{{ route('edit.notulen', $rapat->id) }}" class="btn btn-secondary btn-sm">Edit
                        Notulen</a>
                    @endcan
                    {{-- <a href="{{ route('lihat.notulen', $rapat->notulen->id) }}" target="_blank"
                      class="btn btn-secondary btn-sm">Print Notulen</a> --}}
                    <a href="{{ route('download.notulen', $rapat->notulen->id) }}"
                      class="btn btn-secondary btn-sm">Unduh Notulen</a>
                    <a href="{{ route('dokumentasi', $rapat->slug) }}"
                      class="btn btn-secondary btn-sm mt-1 mt-md-0">Dokumentasi
                      Rapat</a>
                  </div>
                </div>

              </div>

              <hr class="my-4 border">

              <div class="d-md-flex justify-content-between">
                <h6 class="font-weight-bold card-title">Daftar Hadir</h6><br>
                @can('pegawai')
                  <div class="mt-2 mt-md-0">
                    <button class="btn btn-info btn-sm badge" data-toggle="modal" data-target="#modalTambah">Tambah
                      Peserta</button>
                    <a href="{{ route('print.absen', $rapat->id) }}" class="btn btn-secondary btn-sm badge">Unduh
                      Daftar Hadir</a>
                    <button class="btn btn-secondary btn-sm badge" data-toggle="modal" data-target="#modalAbsen">File
                      Daftar Hadir</button>
                  </div>
                @else
                  <a href="{{ route('print.absen', $rapat->id) }}" class="btn btn-secondary btn-sm badge">Unduh
                    Daftar Hadir</a>
                @endcan

              </div>

              <div class="mt-3">
                <div class="table-responsive">
                  <table id="tabel-data" class="table table-sm table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nama Lengkap</th>
                        <th>NIP</th>
                        <th>Jabatan</th>
                        <th>Keterangan</th>
                        @can('pegawai')
                          <th>Action</th>
                        @endcan
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($peserta as $item)
                        <tr>
                          <td>{{ $loop->iteration }}.</td>
                          <td>{{ $item->nama }}</td>
                          <td>{{ $item->nip }}</td>
                          <td>{{ $item->jabatan }}</td>
                          <td>{{ $item->keterangan }}</td>
                          @can('pegawai')
                            <td>
                              <form action="{{ route('delete.peserta', $item->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button onclick="return confirm('Hapus peserta rapat?')" type="submit"
                                  class="btn btn-danger btn-sm badge">Hapus Peserta</button>
                              </form>
                            </td>
                          @endcan
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>

  <script>
    function copyText() {
      var copyText = document.getElementById("text-copy");
      copyText.select();
      document.execCommand("copy");
    }
  </script>

@endsection
