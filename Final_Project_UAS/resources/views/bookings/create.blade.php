@extends('layouts.app')

@section('content')

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

    {{-- ALERT SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- ALERT ERROR (Bentrok atau Validasi) --}}
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- VALIDATION ERROR --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="card shadow booking-card">
        <div class="card-header">
            Form Booking Ruangan
        </div>

        <div class="card-body p-4">
            <form action="{{ route('bookings.store') }}" method="POST">
                @csrf

                <div class="row g-4">

                    {{-- ROOM --}}
                    <div class="col-md-3">
                        <label class="form-label">Pilih Ruangan</label>
                        <select name="room_id" class="form-select shadow-sm" required>
                            <option value="" disabled selected>-- pilih ruangan --</option>
                            @foreach($rooms as $room)
                                <option value="{{ $room->id }}"
                                    {{ old('room_id') == $room->id ? 'selected' : '' }}>
                                    {{ $room->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- DATE --}}
                    <div class="col-md-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="date" class="form-control shadow-sm"
                               value="{{ old('date') }}" required>
                    </div>

                    {{-- START --}}
                    <div class="col-md-3">
                        <label class="form-label">Mulai</label>
                        <input type="time" name="start_time" class="form-control shadow-sm"
                               value="{{ old('start_time') }}" required>
                    </div>

                    {{-- END --}}
                    <div class="col-md-3">
                        <label class="form-label">Selesai</label>
                        <input type="time" name="end_time" class="form-control shadow-sm"
                               value="{{ old('end_time') }}" required>
                    </div>

                </div>

                {{-- PURPOSE --}}
                <div class="mt-4">
                    <label class="form-label">Keperluan</label>
                    <textarea name="purpose" rows="3" class="form-control shadow-sm">{{ old('purpose') }}</textarea>
                </div>

                {{-- BUTTONS --}}
                <div class="mt-4 text-end">
                    <button class="btn btn-secondary me-2" type="reset">Reset</button>
                    <button class="btn btn-primary" type="submit">Submit Booking</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
