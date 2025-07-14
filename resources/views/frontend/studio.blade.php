<!DOCTYPE html>
<html>
<head>
    <title>Detail Studio - {{ $studio->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Detail Studio: {{ $studio->name }}</h2>
    <p><strong>Deskripsi:</strong> {{ $studio->description }}</p>
    <p><strong>Harga per Jam:</strong> Rp {{ number_format($studio->price_per_hour) }}</p>

    <hr>

    <h4>Form Booking</h4>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="/booking" method="POST">
    @csrf
    <input type="hidden" name="studio_id" value="{{ $studio->id }}">
    <input type="date" name="booking_date" required>
    <input type="time" name="start_time" required>
    <input type="time" name="end_time" required>
    <button type="submit">Booking</button>
</form>

</div>
</body>
</html>
