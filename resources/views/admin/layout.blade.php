<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel | Booking Studio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: #fff;
        }
        .sidebar a {
            color: #ddd;
            display: block;
            padding: 10px 20px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 sidebar">
            <h4 class="p-3">Admin Panel</h4>
            <a href="/admin/dashboard">Dashboard</a>
            <a href="/admin/studios">Data Studio</a>
            <a href="/admin/bookings">Data Booking</a>
            <a href="/logout">Logout</a>
        </div>

        <!-- Content -->
        <div class="col-md-9 p-4">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
