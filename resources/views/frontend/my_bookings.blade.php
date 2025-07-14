@extends('frontend.layout')

@section('content')
    <h2 class="mb-4">Daftar Booking Saya</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Studio</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($bookings as $booking)
                <tr>
                    <td>{{ $booking->studio->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('d-m-Y') }}</td>
                    <td>{{ $booking->start_time }} - {{ $booking->end_time }}</td>
                    <td>
                        @if($booking->status == 'pending')
                            <span class="badge bg-warning text-dark">Pending</span>
                        @elseif($booking->status == 'approved')
                            <span class="badge bg-success">Disetujui</span>
                        @elseif($booking->status == 'rejected')
                            <span class="badge bg-danger">Ditolak</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada booking.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
