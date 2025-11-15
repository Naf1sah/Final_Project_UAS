@extends('layouts.app')

@section('content')

{{-- Custom background + card style --}}
<style>
    body {
        background: #f3f6fb !important;
    }
    .booking-card {
        border-radius: 14px;
        overflow: hidden;
        border: none;
    }
    .booking-card .card-header {
        background: linear-gradient(135deg, #007bff, #00a6ff);
        color: white;
        font-size: 18px;
        font-weight: 600;
        padding: 16px 20px;
    }
    .form-label {
        font-weight: 600 !important;
        color: #333;
    }
    .btn-primary {
        padding-left: 25px;
        padding-right: 25px;
        border-radius: 8px;
    }
    .btn-secondary {
        border-radius: 8px;
    }
</style>

<div class="container-fluid px-4">

    <h3 class="fw-bold mb-4">📄 Buat Booking Ruangan</h3>

    <div class="card shadow booking-card">

        {{-- HEADER --}}
        <div class="card-header">
            Form Booking Ruangan
        </div>

        {{-- BODY --}}
        <div class="card-body p-4">

            <form action="{{ route('bookings.store') }}" method="POST">
                @csrf

                <div class="row g-4">

                    {{-- Pilih Ruangan --}}
                    <div class="col-md-3">
                        <label class="form-label">Pilih Ruangan</label>
                        <select name="room_id" class="form-select shadow-sm" required>
                            <option value="" disabled selected>-- pilih ruangan --</option>
                            @foreach($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Tanggal --}}
                    <div class="col-md-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="date" class="form-control shadow-sm" required>
                    </div>

                    {{-- Jam Mulai --}}
                    <div class="col-md-3">
                        <label class="form-label">Mulai</label>
                        <input type="time" name="start_time" class="form-control shadow-sm" required>
                    </div>

                    {{-- Jam Selesai --}}
                    <div class="col-md-3">
                        <label class="form-label">Selesai</label>
                        <input type="time" name="end_time" class="form-control shadow-sm" required>
                    </div>

                </div>

                {{-- Keperluan --}}
                <div class="mt-4">
                    <label class="form-label">Keperluan</label>
                    <textarea name="purpose" rows="3" class="form-control shadow-sm"></textarea>
                </div>

                {{-- Buttons --}}
                <div class="mt-4 text-end">
                    <button class="btn btn-secondary me-2" type="reset">Reset</button>
                    <button class="btn btn-primary" type="submit">Submit Booking</button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
