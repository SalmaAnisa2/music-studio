<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Beranda - Music Studio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }
        .studio-card {
            width: 100%;
            height: 100%;
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }
    </style>
</head>
<body>

    @include('partials.navbar')

    <div class="container py-5 text-center">
        <h2 class="mb-5">Daftar Studio Musik</h2>

        <div class="row justify-content-center">
            @foreach($studios as $studio)
                <div class="col-md-6 col-lg-5 mb-4 d-flex justify-content-center">
                    <div class="card studio-card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $studio->name }}</h5>
                            <p class="card-text">{{ $studio->description }}</p>
                            <p><strong>Rp {{ number_format($studio->price_per_hour) }}</strong> / jam</p>
                            <a href="{{ route('studio.detail', $studio->id) }}" class="btn btn-primary btn-sm mt-2">Booking</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
