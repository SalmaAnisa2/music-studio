<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Studio - {{ $studio->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light" style="font-family: 'Segoe UI', sans-serif;">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Music Studio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if(session('loginId'))
                        <li class="nav-item"><a class="nav-link" href="/my-bookings">My Bookings</a></li>
                        <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <h2 class="mb-4">Detail Studio: {{ $studio->name }}</h2>
        <p><strong>Deskripsi:</strong> {{ $studio->description }}</p>
        <p><strong>Harga per Jam:</strong> Rp {{ number_format($studio->price_per_hour) }}</p>

        @if(session('success'))
            <div class="alert alert-success mt-4">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger mt-4">{{ session('error') }}</div>
        @endif

        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Form Booking</h5>
                <form action="/booking" method="POST">
                    @csrf
                    <input type="hidden" name="studio_id" value="{{ $studio->id }}">

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Anda</label>
                        <input type="text" class="form-control" name="nama" id="nama" required>
                    </div>

                    <div class="mb-3">
                        <label for="booking_date" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="booking_date" id="booking_date" required>
                    </div>

                    <div class="mb-3">
                        <label for="start_time" class="form-label">Jam Mulai</label>
                        <input type="time" class="form-control" name="start_time" id="start_time" required>
                    </div>

                    <div class="mb-3">
                        <label for="end_time" class="form-label">Jam Selesai</label>
                        <input type="time" class="form-control" name="end_time" id="end_time" required>
                    </div>

                    <button type="submit" class="btn btn-success">Booking Sekarang</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
