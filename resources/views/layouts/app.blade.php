<!DOCTYPE html>
<html lang="en">
  <head>
        @include('layouts.head')
        @yield('custom-css')
  </head>
  <body>
    <div class="container-scroller">
      @include('layouts.nav')
      <div class="container-fluid page-body-wrapper">
        @include('layouts.sidebar')
        <div class="main-panel">
          <div class="content-wrapper">
                @yield('content')
          </div>
          <!-- content-wrapper ends -->
         @include('layouts.footer')
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('layouts.js')
    @yield('custom-js')
  </body>
</html>