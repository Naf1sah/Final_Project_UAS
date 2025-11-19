@extends('layouts.app')

@section('title', 'User Dashboard')

@section('content')
<div class="card shadow-lg border-0" style="border-radius: 20px;">

    <!-- HEADER: biru gradient seperti login -->
    <div class="card-header text-white" 
        style="
            background: linear-gradient(to right, #2563eb, #1d4ed8, #fbbf24);
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        ">
        <h4 class="mb-0">Dashboard Pengguna</h4>
    </div>

    <div class="card-body">

        <p class="mb-3">Selamat datang, <strong>{{ Auth::user()->name }}</strong>!</p>
        <p>Anda berhasil login ke sistem pemesanan ruangan.</p>

        <hr>

        <div class="mt-3 d-flex gap-2 flex-wrap">

            <a href="{{ route('bookings.create') }}" class="btn text-white"
                style="background-color: #16a34a;">
                <i class="fas fa-plus"></i> Buat Booking Baru
            </a>

            <a href="{{ route('bookings.index') }}" class="btn text-white"
                style="background-color: #374151;">
                <i class="fas fa-list"></i> Lihat Daftar Booking
            </a>

        </div>
    </div>
</div>
@endsection
