<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use App\Models\Booking;

class DashboardController extends Controller
{
   public function staff()
{
    // Statistik dasar
    $totalRuangan = Room::count();
    $ruanganAktif = Room::where('status', 'available')->count();
    $totalBooking = Booking::count();

    // Grafik booking per ruangan
    $grafikData = Booking::with('room')
        ->selectRaw('room_id, COUNT(*) as total')
        ->groupBy('room_id')
        ->get()
        ->map(fn($row) => [
            'room' => $row->room?->name ?? 'Unknown',
            'total' => $row->total,
        ]);

    return view('dashboard.staff', compact(
        'totalRuangan',
        'ruanganAktif',
        'totalBooking',
        'grafikData',
    ));
}



    public function user()
{
    $user = Auth::user();

    $totalRuangan = Room::count();
    $ruanganAktif = Room::where('status', 'available')->count();

    // Ambil semua data lengkap ruangan
    $daftarRuangan = Room::select('name', 'location', 'capacity')->get();

    return view('dashboard.user', compact(
        'user',
        'totalRuangan',
        'ruanganAktif',
        'daftarRuangan'
    ));
}

}
