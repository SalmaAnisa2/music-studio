<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/"> Music Studio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @if (session('role') === 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/dashboard">Dashboard Admin</a>
                    </li>
                @endif
                
                @if(Session::has('user_id'))
                    <a href="{{ route('user.bookings') }}">Booking Saya</a>
                @endif

                @if (session('loginId'))
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
