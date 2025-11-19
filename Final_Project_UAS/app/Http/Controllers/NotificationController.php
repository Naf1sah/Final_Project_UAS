<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    // Menampilkan semua notifikasi user
    public function index()
    {
        $notifications = Auth::user()->notifications()->latest()->get();

        return view('notifications.index', compact('notifications'));
    }

    // Menandai notifikasi sebagai sudah dibaca
    public function markRead($id)
    {
        $notif = DatabaseNotification::findOrFail($id);

        // Cek apakah notifikasi milik user yang sedang login
        if ($notif->notifiable_id == Auth::id()) {
            $notif->markAsRead();
        }

        return redirect()->back();
    }
}
