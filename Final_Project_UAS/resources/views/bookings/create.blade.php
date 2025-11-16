@extends('layouts.app')

@section('title', 'Create Booking')

@section('content')
<div class="container mt-4">

    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Form Booking Ruangan</h4>
        </div>

        <div class="card-body">

            {{-- Error global --}}
            @if ($errors->has('time'))
                <div class="alert alert-danger">
                    {{ $errors->first('time') }}
                </div>
            @endif

            <form action="{{ route('bookings.store') }}" method="POST">
                @csrf

                {{-- PILIH RUANGAN --}}
                <div class="form-group">
                    <label>Ruangan</label>
                    <select name="room_id" class="form-control" required>
                        <option value="">-- Pilih Ruangan --</option>
                        @foreach($rooms as $room)
                            <option value="{{ $room->id }}">
                                {{ $room->name }} (kapasitas: {{ $room->capacity }})
                            </option>
                        @endforeach
                    </select>
                    @error('room_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- TANGGAL --}}
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" name="date" class="form-control" value="{{ old('date') }}" required>
                    @error('date') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- JAM MULAI --}}
                <div class="form-group">
                    <label>Jam Mulai</label>
                    <input type="time" name="start_time" class="form-control" value="{{ old('start_time') }}" required>
                    @error('start_time') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- JAM SELESAI --}}
                <div class="form-group">
                    <label>Jam Selesai</label>
                    <input type="time" name="end_time" class="form-control" value="{{ old('end_time') }}" required>
                    @error('end_time') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- KEGUNAAN --}}
                <div class="form-group">
                    <label>Keperluan</label>
                    <textarea name="purpose" class="form-control" rows="3">{{ old('purpose') }}</textarea>
                    @error('purpose') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <button type="submit" class="btn btn-success mt-3">Kirim Permintaan</button>
                <a href="{{ route('bookings.index') }}" class="btn btn-secondary mt-3">Kembali</a>

            </form>

        </div>
    </div>

</div>
@endsection
