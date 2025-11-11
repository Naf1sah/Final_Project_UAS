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
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">


{{-- Navbar --}}
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
</li>
</ul>


<ul class="navbar-nav ml-auto">
<li class="nav-item">
<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">@csrf</form>
</li>
</ul>
</nav>


{{-- Sidebar --}}
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<a href="#" class="brand-link">
<span class="brand-text font-weight-light">Room Booking</span>
</a>


<div class="sidebar">
<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
<li class="nav-item">
<a href="{{ route('rooms.index') }}" class="nav-link @if(request()->routeIs('rooms.*')) active @endif">
<i class="nav-icon fas fa-door-open"></i>
<p>Ruangan</p>
</a>
</li>
<li class="nav-item">
</html>