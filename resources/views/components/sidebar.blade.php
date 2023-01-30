<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('') }}dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">NOTULENSI</span>
  </a>

  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('') }}img/user.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item @if (request()->is('/')) menu-open @endif">
          <a href="{{ route('dashboard') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        @can('admin')
          <li class="nav-item @if (request()->is('manajemen-user')) menu-open @endif">
            <a href="{{ route('manajemen.user') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Manajemen User
              </p>
            </a>
          </li>
        @endcan

        <li class="nav-item @if (request()->is('jenis-rapat') || request()->is('rapat*')) menu-open @endif">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Rapat
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @can('admin')
              <li class="nav-item">
                <a href="{{ route('jenis.rapat') }}" class="nav-link @if (request()->is('jenis-rapat')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jenis Rapat</p>
                </a>
              </li>
            @endcan

            <li class="nav-item">
              <a href="{{ route('rapat') }}" class="nav-link @if (request()->is('rapat*')) active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Rapat</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-header">
          <hr class="bg-light">
        </li>

        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
</aside>
