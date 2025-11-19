<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Room Booking')</title>

    <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <!-- AdminLTE & Dependencies -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    {{-- Navbar --}}
    <style>
    /* Navbar hover */
    .navbar-nav .nav-link:hover {
        color: #2563eb !important;
        background: rgba(37, 99, 235, 0.08);
        border-radius: 6px;
    }

    /* Dropdown styling */
    .dropdown-menu {
        border-radius: 10px;
    }

    .dropdown-item:hover {
        background: rgba(37, 99, 235, 0.12);
        color: #1d4ed8 !important;
        font-weight: 500;
    }
</style>

    @include('layouts.partials.navbar')

    {{-- Sidebar --}}
    <style>
    /* Hover item */
    .nav-sidebar .nav-item:hover > .nav-link {
        background: rgba(255, 255, 255, 0.25) !important;
        color: white !important;
    }
    .nav-sidebar .nav-item:hover > .nav-link i {
        color: white !important;
    }

    /* Active (saat halaman sedang dibuka) */
    .nav-sidebar .nav-link.active {
        background: #ffffff !important;
        color: #1d4ed8 !important; /* biru */
        font-weight: bold;
    }

    /* Icon ikut biru saat active */
    .nav-sidebar .nav-link.active i {
        color: #1d4ed8 !important;
    }
</style>


    @include('layouts.partials.sidebar')

    {{-- Main Content --}}
    <div class="content-wrapper">
        <section class="content pt-3">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>

    {{-- Footer --}}
    <footer class="main-footer text-sm text-center">
        <strong>&copy; {{ date('Y') }} Room Booking</strong> All rights reserved.
    </footer>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

</body>
</html>
