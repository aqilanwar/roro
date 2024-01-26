<?php

namespace App\Filament\Employee\Resources\BookingResource\Pages;

use App\Filament\Employee\Resources\BookingResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBooking extends CreateRecord
{
    protected static string $resource = BookingResource::class;
}
