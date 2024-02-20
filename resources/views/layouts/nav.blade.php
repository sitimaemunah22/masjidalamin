      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo" href="#">
            <h2><span class="text-white text-center"></span></h2>
          </a>
          <a class="navbar-brand brand-logo-mini" href="#"><img src="asset/image/logomasjid.png" alt="logo" /></a>

        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
   
          <ul class="navbar-nav navbar-nav-right ml-auto">
            
            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <span class="font-weight-normal"> {{ auth()->user()->name }} </span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
         
                  <p class="mb-1 mt-3">{{ auth()->user()->name }}</p>
                  <p class="font-weight-light text-muted mb-0">{{ auth()->user()->email }}</p>
                </div>
                <a class="dropdown-item" href="{{ route('admin.user.profil', auth()->user()->id_user) }}"><i class="dropdown-item-icon icon-user text-primary"></i> Profil</a>
                <a class="dropdown-item" href="#" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i class="dropdown-item-icon icon-power text-primary"></i>Keluar</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->