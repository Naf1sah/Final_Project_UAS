@php
    $user = Auth::user();
    $dashboardRoute = $user->role === 'staff' ? route('staff.dashboard') : route('user.dashboard');
@endphp

<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ $dashboardRoute }}">
            <i class="fas fa-building"></i> RoomBooking
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <!-- Dashboard -->
                <li class="nav-item {{ request()->is('dashboard') || request()->is('staff/dashboard') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ $dashboardRoute }}">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                </li>

                <!-- Profile -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.edit') }}">
                        <i class="fas fa-user"></i> Profile
                    </a>
                </li>

                <!-- Dropdown User -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                        <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <span class="dropdown-item-text small text-muted">{{ Auth::user()->email }}</span>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="fas fa-sign-out-alt"></i> Log Out
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
