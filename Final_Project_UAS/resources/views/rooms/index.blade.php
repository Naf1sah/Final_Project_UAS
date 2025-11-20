@extends('layouts.admin')

@section('title', 'Daftar Ruangan')

@section('content')
<div class="container-fluid">
    <h1 class="fw-bold">Daftar Ruangan</h1>

    <a href="{{ route('rooms.create') }}" class="btn btn-primary mb-3 mt-3">Tambah Ruangan</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kapasitas</th>
                <th>Lokasi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
            <tr>
                <td>{{ $room->name }}</td>
                <td>{{ $room->capacity }}</td>
                <td>{{ $room->location }}</td>
                <td>{{ $room->status }}</td>
                <td>
                    <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>

                    <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                       <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus ruangan ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
