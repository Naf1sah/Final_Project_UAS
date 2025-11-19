<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class BookingCreatedNotification extends Notification
{
    use Queueable;

    protected $booking;

    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    // Simpan ke database
    public function via($notifiable)
    {
        return ['database'];
    }

    // Isi notifikasi
    public function toArray($notifiable)
    {
        return [
            'title' => 'Booking Baru',
            'message' => 'Booking ruangan ' . $this->booking->room->name . ' berhasil dibuat.',
            'booking_id' => $this->booking->id,
        ];
    }
}
