<!-- Navbar -->
<nav class="main-header navbar navbar-expand"
     style="background: #ffffff; border-bottom: 2px solid #1d4ed8;">

    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-primary" data-widget="pushmenu" href="#">
                <i class="fas fa-bars fa-lg"></i>
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <!-- Notifikasi -->
        @auth
        <li class="nav-item dropdown">
            <a class="nav-link position-relative" data-toggle="dropdown" href="#">

                <i class="fas fa-bell fa-lg text-primary"></i>

                @php
                    $unreadCount = Auth::user()->unreadNotifications()->count();
                @endphp

                @if ($unreadCount > 0)
                    <span class="badge badge-danger navbar-badge">
                        {{ $unreadCount }}
                    </span>
                @endif
            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right shadow-lg">

                <span class="dropdown-header text-primary font-weight-bold">
                    {{ $unreadCount }} Notifikasi
                </span>

                <div class="dropdown-divider"></div>

                @forelse(Auth::user()->notifications()->latest()->take(5)->get() as $notif)
                    <a href="{{ route('notifications.read', $notif->id) }}" class="dropdown-item">

                        <i class="fas fa-info-circle mr-2 text-primary"></i>

                        {{ $notif->data['title'] ?? 'Notifikasi' }}
                        <br>

                        <small class="text-muted">
                            {{ $notif->data['message'] ?? '' }}
                        </small>

                        <span class="float-right text-sm text-muted">
                            {{ $notif->created_at->diffForHumans() }}
                        </span>

                    </a>
                    <div class="dropdown-divider"></div>
                @empty
                    <span class="dropdown-item text-center text-muted">
                        Tidak ada notifikasi
                    </span>
                @endforelse

                <div class="dropdown-divider"></div>

                <a href="{{ route('notifications.all') }}" class="dropdown-item dropdown-footer text-primary">
                    Lihat Semua Notifikasi
                </a>
            </div>
        </li>
        @endauth

        <!-- User Dropdown -->
        @auth
        <li class="nav-item dropdown">
            <a class="nav-link d-flex align-items-center" data-toggle="dropdown" href="#">

                <i class="fas fa-user-circle fa-2x mr-2 text-primary"></i>

                <span class="mr-1 text-dark">{{ Auth::user()->name }}</span>

                <i class="fas fa-chevron-down text-primary"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right shadow-lg">

                <a href="{{ route('profile.index') }}" class="dropdown-item">
                    <i class="fas fa-user-circle fa-lg mr-2 text-primary"></i> Profile
                </a>

                <div class="dropdown-divider"></div>

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
