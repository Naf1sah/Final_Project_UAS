@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Notifikasi</h3>
    <hr>

    @foreach ($notifications as $notif)
        <div class="alert alert-{{ $notif->read_at ? 'secondary' : 'primary' }}">
            <strong>{{ $notif->data['title'] }}</strong> <br>
            {{ $notif->data['message'] }}

            <div class="mt-2">
                @if(!$notif->read_at)
                    <a href="{{ route('notifications.read', $notif->id) }}" class="btn btn-sm btn-success">
                        Tandai Dibaca
                    </a>
                @endif
            </div>

        </div>
    @endforeach

</div>
@endsection
