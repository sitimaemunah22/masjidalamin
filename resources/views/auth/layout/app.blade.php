<!DOCTYPE html>
<html lang="en">
  <head>
        @include('layouts.head')
        @yield('custom-css')
        <title>@yield('title')</title>
  </head>
  <body>
      <div class="container-fluid">
        <div class="main-panel">
          
            @yield('login_content')
        
          <!-- content-wrapper ends -->
         
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
   
    <!-- container-scroller -->
    @include('layouts.js')
  </body>
</html>