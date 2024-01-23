<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bin extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'bin_name',
        'quantity',
        'price',
        'description',
        'phone_number',
        'image'
    ];


    protected $casts = [
        'image' => 'array' ,
    ];
}
