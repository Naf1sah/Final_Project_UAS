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

            <a href="{{ route('bookings.create') }}" class="btn text-white mr-2 mb-2"
                style="background-color: #16a34a;">
                <i class="fas fa-plus"></i> Buat Booking Baru
            </a>

            <a href="{{ route('bookings.index') }}" class="btn text-white mr-2 mb-2"
                style="background-color: #374151;">
                <i class="fas fa-list"></i> Lihat Daftar Booking
            </a>

        </div>

        <hr>

        <div class="row">

        <div class="col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalRuangan }}</h3>
                    <p>Total Ruangan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-door-open"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $ruanganAktif }}</h3>
                    <p>Ruangan Aktif</p>
                </div>
                <div class="icon">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
        </div>
    </div>
    <hr>

<div class="card mt-4 shadow-sm border-0" style="border-radius: 15px;">
    <div class="card-header bg-primary text-white" 
         style="border-radius: 15px 15px 0 0;">
        <h5 class="mb-0">Daftar Ruangan</h5>
    </div>

    <div class="card-body">

        @forelse ($daftarRuangan as $room)
            <div class="p-3 mb-3 border rounded" style="border-radius: 12px;">
                <h5 class="mb-1">
                    <i class="fas fa-door-open text-primary"></i> 
                    {{ $room->name }}
                </h5>

                <p class="mb-1">
                    <strong>Lokasi:</strong> {{ $room->location }}
                </p>

                <p class="mb-0">
                    <strong>Kapasitas:</strong> {{ $room->capacity }} orang
                </p>
            </div>
        @empty
            <p class="text-muted"><i>Tidak ada ruangan yang terdaftar.</i></p>
        @endforelse

    </div>
</div>

</div>

</div>
@endsection
