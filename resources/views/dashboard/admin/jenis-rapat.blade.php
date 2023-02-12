@extends('layouts.dashboard')
@section('main-content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">Tambah Data</button>
          <!-- Modal -->
          <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Rapat</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <form action="{{ route('add.jenis.rapat') }}" method="post">
                  <div class="modal-body">
                    @csrf
                    <div class="form-group">
                      <label for="nama">Jenis Rapat</label>
                      <input name="nama" type="text" class="form-control" id="nama" required
                        value="{{ old('nama') }}">
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
            <div id="alert" class="alert alert-success alert-dismissible fade show mt-2" role="alert">
              {!! session('success') !!}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
          @if (session('info'))
            <div id="alert" class="alert alert-info alert-dismissible fade show mt-2" role="alert">
              {!! session('info') !!}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
          @if (session('danger'))
            <div id="alert" class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
              {!! session('danger') !!}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
          @error('nama')
            <div id="alert" class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
              {!! $message !!}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @enderror

          <div class="card mt-2">
            <div class="card-header">
              <h3 class="card-title">Anda dapat menambah, mengedit, ataupun menghapus jenis rapat.</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="col-md-9">
                <table id="tabel-data" class="table table-sm table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Jenis Rapat</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($rapat as $rpt)
                      <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td>{{ $rpt->nama }}</td>
                        <td>
                          <button class="btn btn-info btn-sm" data-toggle="modal"
                            data-target="#modalEdit{{ $rpt->id }}">Edit</button>
                          <form action="{{ route('delete.jenis.rapat', $rpt->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Lanjutkan untuk menghapus?')"
                              class="btn btn-danger btn-sm">Hapus</button>
                          </form>
                        </td>
                      </tr>

                      <div class="modal fade" id="modalEdit{{ $rpt->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Jenis Rapat</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>

                            <form action="{{ route('update.jenis.rapat', $rpt->id) }}" method="post">
                              <div class="modal-body">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                  <label for="nama">Jenis Rapat</label>
                                  <input name="nama" type="text" class="form-control" id="nama" required
                                    value="{{ old('nama', $rpt->nama) }}">
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
                  {{-- <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Jenis Rapat</th>
                      <th>Action</th>
                    </tr>
                  </tfoot> --}}
                </table>

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
@endsection
