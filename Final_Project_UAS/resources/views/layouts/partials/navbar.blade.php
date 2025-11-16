<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <!-- Notifikasi -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-bell fa-2x mr-2 text-secondary"></i>
                <span class="badge badge-success navbar-badge">3</span>

            </a>

            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                <span class="dropdown-header">3 Notifications</span>

                <div class="dropdown-divider"></div>

                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 1 new message
                    <span class="float-right text-muted text-sm">2 mins</span>
                </a>

            </div>
        </li>

        <!-- User Dropdown -->
        @auth
        <li class="nav-item dropdown">
            <a class="nav-link d-flex align-items-center" data-toggle="dropdown" href="#">

                <!-- Avatar user -->
               <i class="fas fa-user-circle fa-2x mr-2 text-secondary"></i>
                <!-- Nama user -->
                <span class="mr-1">{{ Auth::user()->name }}</span>

                <!-- Icon panah -->
                <i class="fas fa-chevron-down"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right">

                <!-- Menu profile -->
                <a href="{{ route('profile.index') }}" class="dropdown-item">
                    <i class="fas fa-user-circle fa-lg mr-2 text-secondary"></i> Profile
                </a>

                <div class="dropdown-divider"></div>

                <!-- Logout -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="dropdown-item text-danger">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>

            </div>
        </li>
        @endauth

    </ul>
</nav>
