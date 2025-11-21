@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container-fluid">

    <div class="card card-primary card-outline">
        <div class="card-body box-profile">

            <div class="text-center">
    <div class="position-relative d-inline-block">

        <!-- Foto Profil -->
        <img class="profile-user-img img-fluid img-circle"
             src="{{ $user->photo ? asset('storage/' . $user->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}"
             alt="User profile picture">

        <!-- Tombol Upload -->
        <form id="uploadPhotoForm" action="{{ route('profile.uploadPhoto') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="photoInput"
                style="position: absolute; bottom: 0; right: 0;
                       background: #007bff; color: #fff;
                       width: 32px; height: 32px;
                       border-radius: 50%;
                       display: flex; justify-content: center; align-items: center;
                       cursor: pointer; font-size: 20px;">
                +
            </label>

            <input type="file" id="photoInput" name="photo"
                   class="d-none"
                   onchange="document.getElementById('uploadPhotoForm').submit();">
        </form>

    </div>
</div>



            <h3 class="profile-username text-center">{{ $user->name }}</h3>

            <p class="text-muted text-center">{{ $user->email }}</p>

            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>Nama</b> <span class="float-right">{{ $user->name }}</span>
                </li>

                <li class="list-group-item">
                    <b>Email</b> <span class="float-right">{{ $user->email }}</span>
                </li>
            </ul>

            <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-block">
                <b>Edit Profile</b>
            </a>
        </div>
    </div>

</div>
@endsection
