<?php

namespace App\Filament\Widgets;

use App\Models\{Booking,User};
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsAdmin extends BaseWidget
{
    protected function getStats(): array
    {

        return [
            Stat::make('Total Customer', User::where('role', 'CUSTOMER')->count()),
            Stat::make('Total Employee', User::where('role','EMPLOYEE')->count()),
            Stat::make('Total Booking', Booking::where('payment_status','paid')->count()),
        ];
    }
}
