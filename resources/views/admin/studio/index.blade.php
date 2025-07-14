@extends('admin.layout')

@section('content')
<div class="container">
    <h2>Daftar Studio</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ url('/admin/studios/create') }}" class="btn btn-primary mb-3">Tambah Studio</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($studios as $studio)
                <tr>
                    <td>{{ $studio->name }}</td>
                    <td>{{ $studio->description }}</td>
                    <td>Rp {{ number_format($studio->price_per_hour) }} / jam</td>
                    <td>
                        <a href="{{ url('/admin/studios/'.$studio->id.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ url('/admin/studios/'.$studio->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
