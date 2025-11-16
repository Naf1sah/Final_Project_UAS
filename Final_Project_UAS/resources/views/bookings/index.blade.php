@extends('layouts.app')

@section('title', 'Daftar Booking')

@section('content')
<div class="container mt-4">
    <h3>Daftar Booking</h3>

    <a href="{{ route('bookings.create') }}" class="btn btn-primary mb-3">Buat Booking Baru</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Ruangan</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bookings as $booking)
                <tr>
                    <td>{{ $booking->room->name }}</td>
                    <td>{{ $booking->date }}</td>
                    <td>{{ $booking->start_time }} - {{ $booking->end_time }}</td>
                    <td>{{ ucfirst($booking->status) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada booking.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $bookings->links() }}
</div>
@endsection
