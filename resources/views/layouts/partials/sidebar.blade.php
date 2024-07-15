<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link bg-primary">
      <img src="{{ asset('/AdminLTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SIMASKO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            @php
                $imagePath = auth()->user()->path_image ? asset('storage/' . auth()->user()->path_image) : asset('images/default-profile.png');
            @endphp
            <img src="{{ $imagePath }}" class="img-circle elevation-2 rounded-circle" style="width: 35px; height: 35px;">
        </div>
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ auth()->user()->name }}</a>
        </div>
    </div>
    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          {{-- Menu Supplier --}}
          <li class="nav-item">
            <a href="{{ route('supplier.index') }}" class="nav-link">
              <i class="nav-icon fas fa-shipping-fast"></i>
              <p>
                Supplier
              </p>
            </a>
          </li>

          {{-- Menu Daftar Barang --}}
          <li class="nav-item">
            <a href="{{ route('dbarang.index') }}" class="nav-link">
              <i class="nav-icon fas fa-dolly-flatbed"></i>
              <p>
                Daftar Barang
              </p>
            </a>
          </li>

          {{-- Menu Gudang --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-boxes"></i>
              <p>
                Gudang
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('bmasuk.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Barang Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('bkeluar.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Barang Keluar</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- Menu Servis --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-screwdriver"></i>
              <p>
                Servis
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Servis Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Servis Keluar</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- Karyawan --}}
          @if (auth()->user()->hasRole('admin'))
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fas fa-users"></i>
              <p>
                Karyawan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('karyawan.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Karyawan</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          {{-- Master Data --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fas fa-box"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('kbarang.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('kservis.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori Servis</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- Laporan --}}
          @if (auth()->user()->hasRole('admin'))
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-pdf"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('dbarang.pdf') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Servis</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('karyawan.print') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Karyawan</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          {{-- Pengaturan --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fas fa-user-cog"></i>
              <p>
                Pengaturan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (auth()->user()->hasRole('admin'))
              <li class="nav-item">
                <a href="{{ route('pengguna.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengguna</p>
                </a>
              </li>
              @endif
              <li class="nav-item">
                <a href="{{ route('profile.show') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profil</p>
                </a>
              </li>
            </ul>
          </li>
 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>