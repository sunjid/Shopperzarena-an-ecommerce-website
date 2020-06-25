<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>
    @include('backend.partials.styles')
  </head>
  <body>
    <div class="container-scroller">
      @include('backend.partials.nav')
      <div class="container-fluid page-body-wrapper">
        @include('backend.partials.product-sidebar')

        @yield('content')

        @include('backend.partials.footer')
        </div>
      </div>
      <!-- page-body-wrapper ends -->
    <!-- container-scroller -->
    @include('backend.partials.scripts')
    @yield('script')
  </body>
</html>
