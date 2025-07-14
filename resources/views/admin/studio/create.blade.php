@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h2>Tambah Studio Baru</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ url('/admin/studios') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Nama Studio</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">Jenis</label>
        <input type="text" name="description" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="price_per_hour">Harga / Jam</label>
        <input type="number" name="price_per_hour" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

</div>
@endsection
