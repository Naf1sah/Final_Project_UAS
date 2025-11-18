<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\BookingCreatedNotification;
use App\Notifications\BookingStatusUpdated;
use App\Models\User;
use Illuminate\Support\Facades\Notification;

class BookingController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // staff lihat semua
        if ($user->role === 'staff') {
            $bookings = Booking::with('room', 'user')->latest()->paginate(15);
        } 
        else {
            // mahasiswa/dosen hanya lihat booking miliknya
            $bookings = $user->bookings()
                ->with('room')
                ->latest()
                ->paginate(15);
        }

        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $rooms = Room::where('status', 'available')->get();
        return view('bookings.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'purpose' => 'nullable|string'
        ]);

        // Cek bentrok waktu
        $overlap = Booking::where('room_id', $data['room_id'])
            ->where('date', $data['date'])
            ->where(function ($q) use ($data) {
                $q->whereBetween('start_time', [$data['start_time'], $data['end_time']])
                  ->orWhereBetween('end_time', [$data['start_time'], $data['end_time']])
                  ->orWhere(function ($q2) use ($data) {
                      $q2->where('start_time', '<', $data['start_time'])
                         ->where('end_time', '>', $data['end_time']);
                  });
            })
            ->exists();

        if ($overlap) {
            return back()->withInput()->withErrors([
                'time' => 'Ruangan sudah dibooking pada waktu tersebut.',
            ]);
        }

        // Simpan booking
        $booking = Booking::create([
            'user_id' => Auth::id(),
            'room_id' => $data['room_id'],
            'date' => $data['date'],
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
            'purpose' => $data['purpose'],
            'status' => 'pending',
        ]);

        // 🔔 Kirim notifikasi ke user yang membuat booking
        Auth::user()->notify(new BookingCreatedNotification($booking));

        $staffs = User::where('role', 'staff')->get();
        Notification::send($staffs, new BookingCreatedNotification($booking));
        return redirect()->route('bookings.index')->with('success', 'Permintaan booking diterima.');
    }

    public function approve(Booking $booking)
    {
        $booking->update(['status' => 'approved']);

        // 🔔 Kirim notifikasi perubahan status
        $booking->user->notify(new BookingStatusUpdated($booking));

        return back()->with('success', 'Booking disetujui.');
    }

    public function reject(Booking $booking)
    {
        $booking->update(['status' => 'rejected']);

        // 🔔 Kirim notifikasi perubahan status
        $booking->user->notify(new BookingStatusUpdated($booking));

        return back()->with('success', 'Booking ditolak.');
    }
}
