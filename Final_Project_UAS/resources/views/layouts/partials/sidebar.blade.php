<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4"
    style="background: linear-gradient(to bottom, #2563eb, #1d4ed8, #fbbf24);">

    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link text-center" 
        style="background: rgba(255, 255, 255, 0.15); border-bottom: none;">

        <span class="brand-text font-weight-bold text-white">Room Booking</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar text-white">

        <!-- User Panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <!-- Icon User -->
            <div class="image d-flex align-items-center">
                <i class="fas fa-user-circle fa-2x text-white"></i>
            </div>

            <!-- Nama User -->
            <div class="info ml-2">
                @auth
                    <a href="#" class="d-block text-white font-weight-bold">
                        {{ Auth::user()->name }}
                    </a>
                @else
                    <a href="#" class="d-block text-light">Guest</a>
                @endauth
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">

                @auth
                    <li class="nav-item">
                        <a href="{{ Auth::user()->role === 'staff' ? route('staff.dashboard') : route('user.dashboard') }}"
                           class="nav-link {{ request()->is('dashboard*') || request()->is('staff/dashboard*') ? 'active' : '' }}"
                           style="color: white;">
                            <i class="nav-icon fas fa-tachometer-alt text-white"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    @if(Auth::user()->role === 'staff')
                        <li class="nav-item">
                            <a href="{{ route('rooms.index') }}" class="nav-link text-white">
                                <i class="nav-icon fas fa-door-open text-white"></i>
                                <p>Kelola Ruangan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('bookings.index') }}" class="nav-link text-white">
                                <i class="nav-icon fas fa-calendar-check text-white"></i>
                                <p>Jadwal Booking</p>
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('bookings.create') }}" class="nav-link text-white">
                                <i class="nav-icon fas fa-plus-circle text-white"></i>
                                <p>Buat Booking</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('bookings.index') }}" class="nav-link text-white">
                                <i class="nav-icon fas fa-list text-white"></i>
                                <p>Daftar Booking</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('bookings.rooms') }}" class="nav-link text-white">
                                <i class="nav-icon fas fa-door-open text-white"></i>
                                <p>Daftar Ruangan</p>
                            </a>
                        </li>
                    @endif

                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link text-white">
                            <i class="nav-icon fas fa-sign-in-alt text-white"></i>
                            <p>Login</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link text-white">
                            <i class="nav-icon fas fa-user-plus text-white"></i>
                            <p>Register</p>
                        </a>
                    </li>
                @endauth

            </ul>
        </nav>
    </div>
</aside>
