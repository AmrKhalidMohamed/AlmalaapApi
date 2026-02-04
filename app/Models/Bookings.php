<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;


    public function room()
    {
        return $this->belongsTo(Rooms::class);
    }

    protected $fillable = [
        'customer_id',
        'room_id',
        'booking_date',
        'start_time',
        'end_time',
    ];
}
