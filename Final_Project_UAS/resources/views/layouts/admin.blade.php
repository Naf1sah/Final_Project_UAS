<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Room Booking')</title>

  {{-- AdminLTE CSS (CDN) --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  {{-- Navbar --}}
   @include('layouts.partials.navbar')

  {{-- Sidebar --}}
   @include('layouts.partials.sidebar')

  {{-- Main Content --}}
  <div class="content-wrapper p-4">
    <section class="content">
      @yield('content')
    </section>
  </div>

  {{-- Footer --}}
  <footer class="main-footer text-center">
    <strong>&copy; {{ date('Y') }} Room Booking App.</strong> All rights reserved.
  </footer>
</div>

{{-- Scripts --}}
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

{{-- Page-level scripts (Chart.js, Calendar, dll) --}}
@yield('scripts')

</body>
</html>
