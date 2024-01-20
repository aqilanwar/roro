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
        'status',
        'customer_id',
        'bin_id',
    ];
}
