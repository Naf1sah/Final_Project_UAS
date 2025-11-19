<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffNotificationController extends Controller
{
    // Halaman index semua notifikasi staff
    public function index()
    {
        $notifications = Auth::user()
            ->notifications()
            ->where('type', 'App\Notifications\BookingCreatedNotification')
            ->latest()
            ->get();

        return view('staff.notifications.index', compact('notifications'));
    }

    // Tandai satu notifikasi sebagai dibaca
    public function read($id)
    {
        $notif = Auth::user()->notifications()->findOrFail($id);
        $notif->markAsRead();

        // Redirect ke detail booking biar staff tahu context-nya
        if (isset($notif->data['booking_id'])) {
            return redirect()->route('bookings.show', $notif->data['booking_id']);
        }

        return back();
    }
}
