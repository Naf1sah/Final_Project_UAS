@extends('layouts.admin')

@section('title', 'Staff Dashboard')

@section('content')
<div class="container-fluid">

    {{-- WELCOME CARD --}}
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title">Welcome, {{ Auth::user()->name }}</h3>
        </div>
        <div class="card-body">
            <p>Selamat datang di panel admin/staff.</p>
        </div>
    </div>

    {{-- STATISTIK BOX --}}
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

        <div class="col-md-4">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $totalBooking }}</h3>
                    <p>Total Booking</p>
                </div>
                <div class="icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
            </div>
        </div>

    </div>

    {{-- GRAFIK BOOKING PER RUANGAN --}}
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title">Grafik Booking per Ruangan</h3>
        </div>
        <div class="card-body">
            <canvas id="bookingChart" height="100"></canvas>
        </div>
    </div>

</div>
@endsection

@section('scripts')
{{-- CHARTJS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('bookingChart');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($grafikData->pluck('room')) !!},
            datasets: [{
                label: 'Jumlah Booking',
                data: {!! json_encode($grafikData->pluck('total')) !!},
                tension: 0.4,
                borderColor: 'rgb(54, 162, 235)',
                borderWidth: 3,
                pointBackgroundColor: 'rgb(255, 99, 132)',
                pointRadius: 5
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    min: 0,    // force axis start
                    max: 3,    // force axis end
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>

@endsection
