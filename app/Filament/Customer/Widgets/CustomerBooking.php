<?php

namespace App\Filament\Customer\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\Booking;
use Auth;

class CustomerBooking extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        $customer_id = Auth::user()->id;

        return $table
            ->query(
                Booking::query()->where('user_id', $customer_id),

            )
            ->columns([
                Tables\Columns\TextColumn::make('delivery_address')
                    ->description(fn (Booking $record): string => 'Customer Name: '. $record->user->name)
                    ->searchable(),
            
                Tables\Columns\TextColumn::make('payment_status')

                ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Paid' => 'success',
                        'Cancelled' => 'danger',
                        'Pending' => 'warning',
                        'Rejected' => 'danger',
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                   ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'In Progress' => 'gray',
                        'Returned' => 'success',
                        'Cancelled' => 'danger',
                        // 'rejected' => 'danger',
                    })
                    ->searchable(),
                // Tables\Columns\TextColumn::make('user.name')
                //     ->searchable(),
 
                Tables\Columns\TextColumn::make('booking_date')
                ->date()
                ->sortable(),

                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                ]);
    }
    
}
