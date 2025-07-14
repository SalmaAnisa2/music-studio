<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AaBooking extends Model
{
    protected $table = 'aa_bookings'; // Pastikan ini cocok dengan tabel di database

    protected $fillable = [
        'user_id',
        'studio_id',
        'booking_date',
        'start_time',
        'end_time',
        'status',
    ];

    public function studio()
    {
        return $this->belongsTo(AaStudio::class, 'studio_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
