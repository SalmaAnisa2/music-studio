@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h2>Edit Studio</h2>

    <form action="{{ url('/admin/studios/'.$studio->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nama Studio</label>
            <input type="text" name="name" class="form-control" value="{{ $studio->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Jenis Studio</label>
            <input type="text" name="description" class="form-control" value="{{ $studio->description }}" required>
        </div>
        <div class="mb-3">
            <label for="price_per_hour" class="form-label">Harga per Jam</label>
            <input type="number" name="price_per_hour" class="form-control" value="{{ $studio->price_per_hour }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ url('/admin/studios') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
