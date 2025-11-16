@extends('layouts.admin')

@section('title', 'Staff Dashboard')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header bg-primary text-white">
      <h3 class="card-title">Welcome, {{ Auth::user()->name }}</h3>
    </div>
    <div class="card-body">
      <p>Selamat datang di panel admin/staff.</p>
    </div>
  </div>
</div>
@endsection
