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

                <form method="POST" action="{{ route('profile.update') }}">
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
