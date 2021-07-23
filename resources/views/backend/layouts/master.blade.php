<!DOCTYPE html>
<html lang="en">
<head>
    @include('backend.layouts.header')
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
      @include('backend.layouts.nav')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      @include('backend.layouts.stickyside')

      @include('backend.layouts.todochat')
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      @include('backend.layouts.sidebar')
      <!-- partial -->
      <div class="main-panel">
       @yield('content')
       @include('backend.layouts.footer')
</body>

</html>

