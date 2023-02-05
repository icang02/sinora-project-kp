@extends('layouts.dashboard')
@section('main-content')
  <section class="content">
    <div class="container-fluid">

      {{-- TOAST ALERT --}}
      @if (session('success'))
        <button id="modal" type="button" style="display: none;" class="btn btn-success toastrDefaultSuccess"></button>
      @elseif(session('danger'))
        <button id="modal" type="button" style="display: none;" class="btn btn-success toastrDefaultError"></button>
      @elseif(session('successPassword'))
        <button id="modal" type="button" style="display: none;"
          class="btn btn-success toastrDefaultSuccessPassword"></button>
      @endif
      @error('password')
        @php
          $error = $message;
        @endphp
        <button id="modal" type="button" style="display: none;" class="btn btn-success toastrDefaultErrorr"></button>
      @enderror

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

      {{-- END TOAST ALERT --}}

      {{-- @if (session('success'))
        <div id="alert" class="alert alert-success alert-dismissible fade show mt-2" role="alert">
          {!! session('success') !!}
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
      @error('password')
        <div id="alert" class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
          {{ $message }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @enderror --}}

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{ asset('img/user.png') }}"
                  alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>

              <p class="text-muted text-center">{{ auth()->user()->level }}</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item text-center">
                  <b>{{ auth()->user()->email }}</b>
                </li>
              </ul>

              {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#profil" data-toggle="tab">Profil Saya</a></li>
                <li class="nav-item"><a class="nav-link" href="#changePassword" data-toggle="tab">Ubah Password</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="profil">
                  <form class="form-horizontal" action="{{ route('update.profil', auth()->user()->id) }}" method="POST">
                    {{ csrf_field() }}
                    @method('put')
                    <div class="form-group row">
                      <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                      <div class="col-sm-10">
                        <input name="name" type="text" class="form-control" id="name"
                          placeholder="Nama Lengkap" value="{{ old('name', auth()->user()->name) }}" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="email" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input name="email" type="email" class="form-control" id="email" placeholder="Email"
                          value="{{ old('email', auth()->user()->email) }}" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="level" class="col-sm-2 col-form-label">Level User</label>
                      <div class="col-sm-10">
                        <input readonly type="text" class="form-control text-uppercase" id="level"
                          placeholder="level" value="{{ auth()->user()->level }}">
                      </div>
                    </div>
                    {{-- <div class="form-group row">
                      <label for="level" class="col-sm-2 col-form-label">Level User</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="level">
                          <option value="">Pilih ...</option>
                          <option value="Administrator">ADMINISTRATOR</option>
                          <option value="Pegawai">PEGAWAI</option>
                        </select>
                      </div>
                    </div> --}}

                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Simpan</button>
                      </div>
                    </div>
                  </form>
                </div>

                <div class="tab-pane" id="changePassword">
                  <form class="form-horizontal" action="{{ route('change.password', auth()->user()->id) }}"
                    method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group row">
                      <label for="password_lama" class="col-sm-2 col-form-label">Password Lama</label>
                      <div class="col-sm-10">
                        <input name="password_lama" type="password" class="form-control" id="password_lama"
                          placeholder="Password Lama" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="password" class="col-sm-2 col-form-label">Password Baru</label>
                      <div class="col-sm-10">
                        <input name="password" type="password" class="form-control" id="password"
                          placeholder="Password Baru" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="password_confirmation" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                      <div class="col-sm-10">
                        <input name="password_confirmation" type="password" class="form-control"
                          id="password_confirmation" placeholder="Konfirmasi Password" required>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Ubah Password</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection
