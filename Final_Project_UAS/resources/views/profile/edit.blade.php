@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Profil</h3>
                </div>

                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="card-body">

                        @if (session('status') === 'profile-updated')
                            <div class="alert alert-success">Profil berhasil diperbarui.</div>
                        @endif

                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input id="name" type="text" class="form-control" value="{{ $user->name }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" value="{{ $user->email }}" readonly>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="current_password">Password Lama</label>
                            <input id="current_password" type="password" name="current_password" class="form-control">
                            @error('current_password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password Baru</label>
                            <input id="password" type="password" name="password" class="form-control">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control">
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="photo">Foto Profil</label>
                            @if ($user->photo)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $user->photo) }}" width="120" class="img-thumbnail">
                                </div>
                            @endif

                            <input id="photo" type="file" name="photo" class="form-control">
                            @error('photo')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('profile.index') }}" class="btn btn-secondary float-right">Kembali</a>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>
@endsection
