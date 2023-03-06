<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }

    public function bookingDetails()
    {
        return $this->hasMany(BookingDetail::class, 'room_id');
    }

    public function isAvailable($date)
    {
        $bookings = $this->bookingDetails()
            ->whereHas('booking', function ($query) use ($date) {
                $query->where(function ($query) use ($date) {
                    $query->where('booking_status', '=', 'approved')
                        ->orWhere('booking_status', '=', 'check_in');
                })
                    ->where(function ($query) use ($date) {
                        $query->whereDate('check_in_date', '<=', $date)
                            ->whereDate('check_out_date', '>=', $date);
                    });
            })
            ->exists();

        return !$bookings;
    }
}
