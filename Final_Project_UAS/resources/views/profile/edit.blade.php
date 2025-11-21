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
                            <div class="alert alert-success">
                                Profil berhasil diperbarui.
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input id="name" type="text" name="name" class="form-control" 
                                   value="{{ old('name', $user->name) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" name="email" class="form-control"
                                   value="{{ old('email', $user->email) }}" required>
                        </div>

                        {{-- ================= FOTO PROFIL ================= --}}
                        <div class="form-group">
                            <label for="photo">Foto Profil</label>

                            @if ($user->photo)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $user->photo) }}" 
                                         alt="Foto Profil" 
                                         class="img-thumbnail" width="120">
                                </div>
                            @endif

                            <input id="photo" type="file" name="photo" class="form-control">

                            @error('photo')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- ================================================= --}}
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
