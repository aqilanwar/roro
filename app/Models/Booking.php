<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_date',
        'quantity',
        'delivery_address',
        'payment_status',
        'phone_number',

        'status',
        'user_id',
        'bin_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function booking_bin(){
        return $this->hasMany(BookingBin::class, 'booking_id');
    }
    
}
