@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container-fluid">

    <div class="card card-primary card-outline">
        <div class="card-body box-profile">

            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                     src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}"
                     alt="User profile picture">
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
