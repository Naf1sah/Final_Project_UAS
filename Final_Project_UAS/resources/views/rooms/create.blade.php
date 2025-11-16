@extends('layouts.admin')

@section('title', 'Tambah Ruangan')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title">Tambah Ruangan</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('rooms.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Nama Ruangan</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Kapasitas</label>
                    <input type="number" name="capacity" class="form-control">
                </div>

                <div class="form-group">
                    <label>Lokasi</label>
                    <input type="text" name="location" class="form-control">
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label>Status Ruangan</label>
                    <select name="status" class="form-control" required>
                        <option value="available">Tersedia</option>
                        <option value="maintenance">Maintenance</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success mt-3">Simpan</button>
                <a href="{{ route('rooms.index') }}" class="btn btn-secondary mt-3">Kembali</a>

            </form>
        </div>
    </div>
</div>
@endsection
