@extends('layouts.app')

@section('title', 'Daftar Booking')

@section('content')
<div class="container mt-4">
    <h3>Daftar Booking</h3>

    @if(auth()->user()->role == 'user')
        <a href="{{ route('bookings.create') }}" class="btn btn-primary mb-3">Buat Booking Baru</a>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Ruangan</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Status</th>

                @if(auth()->user()->role == 'staff')
                    <th>Aksi</th> <!-- Kolom baru -->
                @endif
            </tr>
        </thead>

        <tbody>
            @forelse($bookings as $booking)
                <tr>
                    <td>{{ $booking->room->name }}</td>
                    <td>{{ $booking->date }}</td>
                    <td>{{ $booking->start_time }} - {{ $booking->end_time }}</td>

                    <td>
                        @if($booking->status == 'pending')
                            <span class="badge badge-warning">Pending</span>
                        @elseif($booking->status == 'approved')
                            <span class="badge badge-success">Approved</span>
                        @else
                            <span class="badge badge-danger">Rejected</span>
                        @endif
                    </td>

                    @if(auth()->user()->role == 'staff')
                    <td>
                        @if($booking->status == 'pending')
                            <form action="{{ route('bookings.approve', $booking->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-sm btn-success">Approve</button>
                            </form>

                            <form action="{{ route('bookings.reject', $booking->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-sm btn-danger">Reject</button>
                            </form>
                        @else
                            <span class="text-muted">—</span>
                        @endif
                    </td>
                    @endif
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada booking.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $bookings->links() }}
</div>
@endsection
