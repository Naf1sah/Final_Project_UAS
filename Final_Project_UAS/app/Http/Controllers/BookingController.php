<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\BookingCreatedNotification;
use App\Notifications\BookingStatusUpdated;

class BookingController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'staff') {
            $bookings = Booking::with('room', 'user')->latest()->paginate(15);
        } else {
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
            'purpose' => 'nullable|string',
        ]);

        // ==== CEK BENTROK ====
        $overlap = Booking::where('room_id', $data['room_id'])
            ->where('date', $data['date'])
            ->where(function ($q) use ($data) {
                $q->where('start_time', '<', $data['end_time'])
                  ->where('end_time', '>', $data['start_time']);
            })
            ->exists();

        if ($overlap) {
            return back()->withInput()->withErrors([
                'time' => '⛔ Ruangan sudah dibooking pada waktu tersebut.',
            ]);
        }

        // ==== SIMPAN BOOKING ====
        $booking = Booking::create([
            'user_id' => Auth::id(),
            'room_id' => $data['room_id'],
            'date' => $data['date'],
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
            'purpose' => $data['purpose'],
            'status' => 'pending',
        ]);

        // Notifikasi ke pembuat booking
        Auth::user()->notify(new BookingCreatedNotification($booking));

        // Notifikasi ke staff
        $staffs = User::where('role', 'staff')->get();
        Notification::send($staffs, new BookingCreatedNotification($booking));

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Permintaan booking diterima.');
    } 

    public function approve(Booking $booking)
    {
        $booking->update(['status' => 'approved']);
        $booking->user->notify(new BookingStatusUpdated($booking));

        return back()->with('success', 'Booking disetujui.');
    }

    public function reject(Booking $booking)
    {
        $booking->update(['status' => 'rejected']);
        $booking->user->notify(new BookingStatusUpdated($booking));

        return back()->with('success', 'Booking ditolak.');
    }
}
