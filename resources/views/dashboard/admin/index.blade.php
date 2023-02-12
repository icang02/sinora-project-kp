@extends('layouts.dashboard')

@section('main-content')
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      @can('admin')
        @php
          $totalRapat = App\Models\Rapat::all()->count();
          $userAktif = App\Models\User::where('status', 'aktif')
              ->get()
              ->count();
          $userTidakAktif = App\Models\User::where('status', 'tidak aktif')
              ->get()
              ->count();
        @endphp

        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $totalRapat }}</h3>

                <p>Total Rapat</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-people"></i>
              </div>
              <a href="{{ route('rapat') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $userAktif }}</h3>

                <p>User Aktif</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-checkmark-circle"></i>
              </div>
              <a href="{{ route('manajemen.user') }}" class="small-box-footer">More info <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $userTidakAktif }}</h3>

                <p>User Tidak Aktif</p>
              </div>
              <div class="icon">
                <i class="ion ion-close-circled"></i>
                {{-- <i class="ion ion-close-circled"></i> --}}
              </div>
              <a href="{{ route('manajemen.user') }}" class="small-box-footer">More info <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      @elsecan('pegawai')
        @php
          $totalRapat = App\Models\Rapat::all()->count();
          $belumDimulai = App\Models\Rapat::where('status', 'belum dimulai')
              ->get()
              ->count();
          $sedangBerjalan = App\Models\Rapat::where('status', 'sedang berjalan')
              ->get()
              ->count();
          $selesai = App\Models\Rapat::where('status', 'selesai')
              ->get()
              ->count();
        @endphp

        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $totalRapat }}</h3>

                <p>Total Rapat</p>
              </div>
              <div class="icon">
                {{-- <i class="ion ion-ios-color-filter"></i> --}}
                <i class="ion ion-ios-people"></i>
              </div>
              <a href="{{ route('rapat') }}" class="small-box-footer">More info <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $belumDimulai }}</h3>
                <p>Belum Dimulai</p>
              </div>
              <div class="icon">
                {{-- <i class="ion ion-calendar"></i> --}}
                <i class="ion ion-android-bookmark"></i>
              </div>
              <a href="{{ url('data-rapat/belum-dimulai') }}" class="small-box-footer">More info <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $sedangBerjalan }}</h3>
                <p>Sedang Berjalan</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-time  "></i>
              </div>
              <a href="{{ url('data-rapat/sedang-berjalan') }}" class="small-box-footer">More info <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $selesai }}</h3>
                <p>Selesai</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-checkmark-circle"></i>
              </div>
              <a href="{{ url('data-rapat/selesai') }}" class="small-box-footer">More info <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      @endcan

      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Rapat</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Jenis Rapat</th>
                      <th>Agenda Rapat</th>
                      <th>Pengisi Rapat</th>
                      <th>Tanggal</th>
                      <th>Mulai</th>
                      <th>Selesai</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $rapat = \App\Models\Rapat::all();
                    @endphp

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
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix text-center">
              <a href="{{ route('rapat') }}" class="small-box-footer">More info <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </section>

        <section class="col-lg-5 connectedSortable">
          <div class="card bg-gradient-primary d-none">
            <div class="card-footer bg-transparent">
              <div class="row">
                <div class="col-4 text-center">
                  <div id="sparkline-1"></div>
                </div>
                <!-- ./col -->
                <div class="col-4 text-center">
                  <div id="sparkline-2"></div>
                </div>
                <!-- ./col -->
                <div class="col-4 text-center">
                  <div id="sparkline-3"></div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->
            </div>
          </div>

          <!-- Calendar -->
          {{-- <div class="card bg-gradient-success">
            <div class="card-header border-0">

              <h3 class="card-title">
                <i class="far fa-calendar-alt"></i>
                Calendar
              </h3>
              <!-- tools card -->
              <div class="card-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"
                    data-offset="-52">
                    <i class="fas fa-bars"></i>
                  </button>
                  <div class="dropdown-menu" role="menu">
                    <a href="#" class="dropdown-item">Add new event</a>
                    <a href="#" class="dropdown-item">Clear events</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">View calendar</a>
                  </div>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pt-0">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.card-body -->
          </div> --}}
          <!-- /.card -->
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
@endsection
