@extends('layouts.dashboard')
@section('main-content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">Tambah Data</button>
          <!-- Modal -->
          <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Buat Rapat</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <form action="{{ route('add.rapat') }}" method="post">
                  <div class="modal-body">
                    @csrf
                    <div class="form-row mb-3">
                      <div class="col-6">
                        <label for="jenis_rapat">Jenis Rapat</label>
                        <select name="jenis_rapat" class="form-control" id="jenis_rapat" required>
                          <option value="">Pilh ...</option>
                          @foreach ($jenisRapat as $item)
                            <option value="{{ $item->id }}" @if (old('jenis_rapat') == $item->id) selected @endif>
                              {{ $item->nama }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-6">
                        <label for="kode">Kode Rapat</label>
                        <input type="text" class="form-control" id="kode" value="Auto Generate" readonly>
                      </div>
                    </div>
                    <div class="form-row mb-3">
                      <div class="col-6">
                        <label for="tanggal">Tanggal</label>
                        <input name="tanggal" type="date" id="tanggal" class="form-control"
                          value="{{ old('tanggal') }}" required>
                      </div>
                      <div class="col-3">
                        <label for="mulai">Mulai</label>
                        <input value="{{ old('mulai') }}" name="mulai" type="time" id="mulai"
                          class="form-control" required>
                      </div>
                      <div class="col-3">
                        <label for="selesai">Selesai</label>
                        <input value="{{ old('selesai') }}" name="selesai" type="time" id="selesai"
                          class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nama">Agenda Rapat</label>
                      <input name="nama" type="text" class="form-control" id="nama" value="{{ old('nama') }}"
                        required>
                    </div>
                    <div class="form-group">
                      <label for="pimpinan_rapat">Pimpinan Rapat</label>
                      <input name="pimpinan_rapat" type="text" class="form-control" id="pimpinan_rapat"
                        value="{{ old('pimpinan_rapat') }}" required>
                    </div>
                    <div class="form-group">
                      <label for="pengisi_rapat">Pengisi Rapat</label>
                      <input name="pengisi_rapat" type="text" class="form-control" id="pengisi_rapat"
                        value="{{ old('pengisi_rapat') }}" required>
                    </div>
                    <div class="form-group">
                      <label for="ruang">Ruang Rapat</label>
                      <input name="ruang" type="text" class="form-control" id="ruang" value="{{ old('ruang') }}"
                        required>
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

          @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
              {!! session('success') !!}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
          {{-- @if (session('info'))
            <div class="alert alert-info alert-dismissible fade show mt-2" role="alert">
              {!! session('info') !!}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif --}}
          {{-- @error('nama')
            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
              {!! $message !!}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @enderror --}}

          <div class="card mt-2">
            <div class="card-header">
              <h3 class="card-title">Anda dapat menambah, mengedit, ataupun menghapus data rapat.</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Jenis Rapat</th>
                    <th>Agenda Rapat</th>
                    <th>Pengisi Rapat</th>
                    <th>Tanggal</th>
                    <th>Mulai</th>
                    <th>Selesai</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($rapat as $rpt)
                    <tr>
                      <td>{{ $loop->iteration }}.</td>
                      <td>{{ $rpt->jenis_rapat->nama }}</td>
                      <td>{{ $rpt->nama }}</td>
                      <td>{{ $rpt->pengisi_rapat }}</td>
                      <td>{{ Carbon\Carbon::createFromDate($rpt->tanggal)->translatedFormat('d/m/Y') }}</td>
                      <td>{{ $rpt->mulai }}</td>
                      <td>{{ $rpt->selesai }}</td>
                      <td>
                        @if ($rpt->status == 'belum dimulai')
                          <button
                            class="btn badge btn-sm btn-primary font-weight-bold">{{ ucfirst($rpt->status) }}</button>
                        @elseif ($rpt->status == 'sedang berjalan')
                          <button
                            class="btn badge btn-sm btn-warning font-weight-bold">{{ ucfirst($rpt->status) }}</button>
                        @else
                          <button
                            class="btn badge btn-sm btn-success font-weight-bold">{{ ucfirst($rpt->status) }}</button>
                        @endif
                      </td>
                      <td>
                        <button class="btn btn-info btn-sm mr-1" data-toggle="modal"
                          data-target="#modalEdit{{ $rpt->id }}">Edit</button>
                        <a class="btn btn-secondary btn-sm" href="{{ route('detail.rapat', $rpt->slug) }}">Detail</a>
                      </td>
                    </tr>

                    <div class="modal fade" id="modalEdit{{ $rpt->id }}" tabindex="-1" role="dialog"
                      aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Rapat</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          <form action="{{ route('update.rapat', $rpt->slug) }}" method="post">
                            <div class="modal-body">
                              @csrf
                              @method('put')
                              <div class="form-row mb-3">
                                <div class="col-6">
                                  <label for="jenis_rapat">Jenis Rapat</label>
                                  <select name="jenis_rapat" class="form-control" id="jenis_rapat" required>
                                    <option value="">Pilh ...</option>
                                    @foreach ($jenisRapat as $item)
                                      <option value="{{ $item->id }}"
                                        @if (old('jenis_rapat', $rpt->jenis_rapat->id) == $item->id) selected @endif>
                                        {{ $item->nama }}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="col-6">
                                  <label for="kode">Kode Rapat</label>
                                  <input type="text" class="form-control" id="kode"
                                    value="{{ $rpt->kode }}" readonly>
                                </div>
                              </div>
                              <div class="form-row mb-3">
                                <div class="col-6">
                                  <label for="tanggal">Tanggal</label>
                                  <input name="tanggal" type="date" id="tanggal" class="form-control"
                                    value="{{ old('tanggal', $rpt->tanggal) }}" required>
                                </div>
                                <div class="col-3">
                                  <label for="mulai">Mulai</label>
                                  <input value="{{ old('mulai', $rpt->mulai) }}" name="mulai" type="time"
                                    id="mulai" class="form-control" required>
                                </div>
                                <div class="col-3">
                                  <label for="selesai">Selesai</label>
                                  <input value="{{ old('selesai', $rpt->selesai) }}" name="selesai" type="time"
                                    id="selesai" class="form-control" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="nama">Agenda Rapat</label>
                                <input name="nama" type="text" class="form-control" id="nama"
                                  value="{{ old('nama', $rpt->nama) }}" required>
                              </div>
                              <div class="form-group">
                                <label for="pimpinan_rapat">Pimpinan Rapat</label>
                                <input name="pimpinan_rapat" type="text" class="form-control" id="pimpinan_rapat"
                                  value="{{ old('pimpinan_rapat', $rpt->pimpinan_rapat) }}" required>
                              </div>
                              <div class="form-group">
                                <label for="pengisi_rapat">Pengisi Rapat</label>
                                <input name="pengisi_rapat" type="text" class="form-control" id="pengisi_rapat"
                                  value="{{ old('pengisi_rapat', $rpt->pengisi_rapat) }}" required>
                              </div>
                              <div class="form-row mb-3">
                                <div class="col-6">
                                  <label for="ruang">Ruang Rapat</label>
                                  <input name="ruang" type="text" class="form-control" id="ruang"
                                    value="{{ old('ruang', $rpt->ruang) }}">
                                </div>
                                <div class="col-6">
                                  <label for="status">Status</label>
                                  <select name="status" class="form-control" id="status" required>
                                    <option value="">Pilh ...</option>
                                    <option value="belum dimulai" @if (old('status', $rpt->status == 'belum dimulai')) selected @endif>Belum
                                      dimulai</option>
                                    <option value="sedang berjalan" @if (old('status', $rpt->status == 'sedang berjalan')) selected @endif>
                                      Sedang berjalan</option>
                                    <option value="selesai" @if (old('status', $rpt->status == 'selesai')) selected @endif>Selesai
                                    </option>
                                  </select>
                                </div>

                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Update Data</button>
                              <button class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </tbody>
              </table>
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
@endsection
