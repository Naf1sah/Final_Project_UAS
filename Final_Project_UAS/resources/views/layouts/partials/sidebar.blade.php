<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link text-center">
        <span class="brand-text font-weight-light">Room Booking</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user info -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    
    <!-- Icon User -->
    <div class="image d-flex align-items-center">
        <i class="fas fa-user-circle fa-2x text-white"></i>
    </div>

    <!-- Nama User -->
    <div class="info ml-2">
        @auth
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        @else
            <a href="#" class="d-block text-muted">Guest</a>
        @endauth
    </div>
</div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                @auth
                    {{-- Dashboard --}}
                    <li class="nav-item">
                        <a href="{{ Auth::user()->role === 'staff' ? route('staff.dashboard') : route('user.dashboard') }}" 
                           class="nav-link {{ request()->is('dashboard*') || request()->is('staff/dashboard*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    {{-- Menu Khusus Staff --}}
                    @if(Auth::user()->role === 'staff')
                        <li class="nav-item">
                            <a href="{{ route('rooms.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-door-open"></i>
                                <p>Kelola Ruangan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('bookings.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-calendar-check"></i>
                                <p>Jadwal Booking</p>
                            </a>
                        </li>
                    
                    {{-- Menu User --}}
                    @else
                        <li class="nav-item">
                            <a href="{{ route('bookings.create') }}" class="nav-link">
                                <i class="nav-icon fas fa-plus-circle"></i>
                                <p>Buat Booking</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('bookings.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>Daftar Booking</p>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a href="{{ route('bookings.rooms') }}" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>Daftar Ruangan</p>
                            </a>
                        </li>
                    @endif
                @else
                    {{-- Guest Menu --}}
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">
                            <i class="nav-icon fas fa-sign-in-alt"></i>
                            <p>Login</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-plus"></i>
                            <p>Register</p>
                        </a>
                    </li>
                @endauth

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>
