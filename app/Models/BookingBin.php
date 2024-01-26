<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingBin extends Model
{
    use HasFactory;

    protected $fillable = [
        'bin_id',
        'booking_id',
        'quantity'
    ];

    
    public function bin()
    {
        return $this->belongsTo(Bin::class, 'bin_id');
    }
}
