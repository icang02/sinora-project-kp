@extends('layouts.dashboard')
@section('main-content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

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
          @error('nama')
            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
              {!! $message !!}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @enderror

          <form action="{{ route('update.notulen', $notulen->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="card mt-2">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-6 col-12">
                    <h5 class="card-title"><span class="font-weight-bold">{{ $notulen->rapat->nama }}</span></h5>
                  </div>
                  <div class="col-md-6 col-12 d-md-flex justify-content-end">
                    <h5 class="card-title">
                      <a href="{{ route('detail.rapat', $notulen->rapat->slug) }}"
                        class="btn btn-secondary btn-sm">Kembali</a>
                    </h5>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="notulis">Notulis</label>
                      <input value="{{ old('notulis', $notulen->notulis) }}" type="text" class="form-control"
                        id="notulis" placeholder="Nama Lengkap" name="notulis" required>
                    </div>
                    <div class="form-group">
                      <label for="nip">NIP</label>
                      <input value="{{ old('nip', $notulen->nip) }}" type="text" class="form-control" id="nip"
                        placeholder="Nomor Identitas Pegawai Negeri Sipil" name="nip" minlength="18" maxlength="18"
                        required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="pangkat">Pangkat</label>
                      <input value="{{ old('pangkat', $notulen->pangkat) }}" type="text" class="form-control"
                        id="pangkat" placeholder="Pangkat" name="pangkat" required>
                    </div>
                    <div class="form-group">
                      <label for="jabatan">Jabatan</label>
                      <input value="{{ old('jabatan', $notulen->jabatan) }}" type="text" class="form-control"
                        id="jabatan" placeholder="Jabatan" name="jabatan" required>
                    </div>
                  </div>
                </div>

                <div class="dropdown-divider"></div>

                <div class="row">
                  <div class="col-12">
                    <label for="summernote">Pembahasan Rapat</label>
                    <textarea name="pembahasan" id="summernote" required>{{ old('pembahasan', $notulen->pembahasan) }}</textarea>
                    @error('pembahasan')
                      <h6 class="text-danger">{{ $message }}</h6>
                    @enderror
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer text-center">
                <button class="btn btn-primary">Simpan Perubahan</button>
              </div>
            </div>
          </form>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
@endsection
