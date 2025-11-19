<?php

namespace App\Notifications;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class BookingStatusUpdated extends Notification
{
    use Queueable;

    public $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'title' => 'Status Booking Diperbarui',
            'message' => "Status booking kamu diubah menjadi: {$this->booking->status}",
            'booking_id' => $this->booking->id,
            'status' => $this->booking->status,
        ];
    }
}
