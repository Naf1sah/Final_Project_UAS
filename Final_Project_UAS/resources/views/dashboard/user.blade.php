@extends('layouts.app')

@section('title', 'User Dashboard')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Dashboard Pengguna</h4>
    </div>
    <div class="card-body">
        <p class="mb-3">Selamat datang, <strong>{{ Auth::user()->name }}</strong>!</p>
        <p>Anda berhasil login ke sistem pemesanan ruangan.</p>

        <hr>

        <div class="mt-3">
            <a href="{{ route('bookings.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Buat Booking Baru
            </a>
            <a href="{{ route('bookings.index') }}" class="btn btn-secondary">
                <i class="fas fa-list"></i> Lihat Daftar Booking
            </a>
        </div>
    </div>
</div>
@endsection
