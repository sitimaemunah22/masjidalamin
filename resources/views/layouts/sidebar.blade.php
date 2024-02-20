
<!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color: green;">
    <!-- Konten sidebar Anda di sini -->


            <ul class="nav">
              <li class="nav-item nav-profile">
                <a href="#" class="nav-link">
                  <div class="text-wrapper">
                    <p class="profile-name">{{ auth()->user()->name }}</p>
                    <p class="designation">{{ auth()->user()->role }}</p>
                  </div>

                </a>
              </li>
              <li class="nav-item nav-category">
                <span class="nav-link">Dashboard</span>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/{{ auth()->user()->role }}/home">
                  <span class="menu-title m-1">Dashboard</span>
                </a>
              </li>
              <li class="nav-item nav-category"><span class="nav-link">Aktifitas</span></li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('pemasukan.index') }}">
                  <span class="menu-title m-1">Pemasukan</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('pengeluaran.index') }}">
                  <span class="menu-title m-1">Pengeluaran</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('jenis.index') }}">
                  <span class="menu-title m-1">Jenis Pemasukan/ <br>Pengeluaran</span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="{{ route('donatur.index') }}">
                  <span class="menu-title m-1">Donatur</span>
                </a>
              </li> 
              <li class="nav-item {{ auth()->user()->role == 'masyarakat' ? 'd-none' : '' }}">
                <a class="nav-link" href="{{ route('admin.user.index') }}">
                  <span class="menu-title m-1">User</span>
                </a>
              </li> 
              <li class="nav-item ">
                <a class="nav-link" href="{{ route('log.index') }}">
                  <span class="menu-title m-1">Log Aktifitas</span>
                </a>
              </li> 
            </ul>
          </nav>
          <!-- partial -->