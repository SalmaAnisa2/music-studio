@extends('admin.layout')

@section('content')
<h3>Edit Status Booking</h3>
<form action="/admin/bookings/{{ $booking->id }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control" required>
            <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="approved" {{ $booking->status == 'approved' ? 'selected' : '' }}>Approved</option>
            <option value="rejected" {{ $booking->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
        </select>
    </div>
    <button class="btn btn-primary">Simpan</button>
    <a href="/admin/bookings" class="btn btn-secondary">Kembali</a>
</form>
@endsection
