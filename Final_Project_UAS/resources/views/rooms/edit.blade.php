@extends('layouts.admin')

@section('title', 'Edit Ruangan')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-warning text-dark">
            <h3 class="card-title">Edit Ruangan: {{ $room->name }}</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('rooms.update', $room->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Nama Ruangan</label>
                    <input type="text" name="name" value="{{ $room->name }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Kapasitas</label>
                    <input type="number" name="capacity" value="{{ $room->capacity }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>Lokasi</label>
                    <input type="text" name="location" value="{{ $room->location }}" class="form-control">
                </div>

                <div class="form-group">
    <label>Penanggung Jawab</label>
    <select name="person_in_charge" class="form-control" required>
        <option value="" disabled>Pilih Penanggung Jawab</option>
        @foreach([
            'John Doe','Jane Smith','Alice Johnson','Bob Brown','Carol White',
            'David Green','Eva Blue','Frank Black','Grace Yellow','Hank Orange',
            'Ivy Purple','Jack Gray','Kathy Silver','Larry Gold','Mona Bronze'
        ] as $user)
            <option value="{{ $user }}" {{ $room->person_in_charge == $user ? 'selected' : '' }}>
                {{ $user }}
            </option>
        @endforeach
    </select>
</div>


                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="description" class="form-control">{{ $room->description }}</textarea>
                </div>

                <div class="form-group">
                    <label>Status Ruangan</label>
                    <select name="status" class="form-control" required>
                        <option value="available" {{ $room->status == 'available' ? 'selected' : '' }}>Tersedia</option>
                        <option value="maintenance" {{ $room->status == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Update</button>
                <a href="{{ route('rooms.index') }}" class="btn btn-secondary mt-3">Kembali</a>

            </form>
        </div>
    </div>
</div>
@endsection
