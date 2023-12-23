<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
    
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-user"></i>
              {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('flogout').submit();" class="dropdown-item dropdown-footer">
                <i class="fas fa-sign-out-alt"></i> Log Out
                <form id="flogout" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form> 
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->
    
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
         <center>
          <span class="brand-text font-weight-light">SIJ</span>
         </center>
        </a>
    
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">{{  Auth::user()->name }}</a>
            </div>
          </div>
    
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item has-treeview {{ Request::segment(1) == 'produk' ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::segment(1) == 'produk' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-check"></i>
                    <p>
                        Penilaian
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                  @if(Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a href="{{ route('periode.index') }}" class="nav-link {{ Request::segment(2) == 'periode' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Periode</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('kriteria.index') }}" class="nav-link {{ Request::segment(2) == 'kriteria' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Kriteria</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('subkriteria.index') }}" class="nav-link {{ Request::segment(2) == 'subkriteria' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Subkriteria</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('karyawan.index') }}" class="nav-link {{ Request::segment(2) == 'karyawan' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Karyawan</p>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{ route('penilaian.index') }}" class="nav-link {{ Request::segment(2) == 'penilaian' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Penilaian</p>
                        </a>
                    </li>
                
                    <li class="nav-item">
                        <a href="{{ route('perangkingan') }}" class="nav-link {{ Request::segment(2) == 'perangkingan' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Hasil Perangkingan</p>
                        </a>
                    </li>
                    
                </ul>
              </li>
              @if(Auth::user()->role == 'admin')

              <li class="nav-item has-treeview {{ Request::segment(1) == 'master' ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ Request::segment(1) == 'master' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Master
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('master.user') }}" class="nav-link {{ Request::segment(2) == 'user' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Pengguna</p>
                        </a>
                    </li>
                </ul>
              </li>
              @endif
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>