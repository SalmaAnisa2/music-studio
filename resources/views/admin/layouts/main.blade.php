<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
        }
        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
        }
        .sidebar a {
            color: white;
            padding: 10px 15px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            padding: 30px;
        }
    </style>
</head>
<body>
<div class="d-flex">
    {{-- Sidebar --}}
    <div class="sidebar">
        <h4 class="text-white text-center py-3">Admin Panel</h4>
        <a href="{{ url('/admin/dashboard') }}">Dashboard</a>
        <a href="{{ url('/admin/studios') }}">Data Studio</a>
        <a href="{{ url('/admin/bookings') }}">Data Booking</a>
        <a href="{{ url('/logout') }}">Logout</a>
    </div>

    {{-- Content --}}
    <div class="content flex-grow-1">
        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
