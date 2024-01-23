<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;
    protected static ?string $navigationLabel = 'Customer Booking';
    protected static ?string $modelLabel = 'Customer Booking';

    protected static ?string $navigationIcon = 'heroicon-o-bookmark';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('booking_date')
                    ->required(),
                Forms\Components\TextInput::make('quantity')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('delivery_address')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone_number')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('payment_status')
                    ->required()
                    ->options([
                        'Paid' => 'Paid',
                        'Pending' => 'Pending',
                        'Cancelled' => 'Cancelled',
                        'Rejected' => 'Rejected',
                    ]),

                Forms\Components\Select::make('status')
                    ->required()
                    ->options([
                        'In Progress' => 'In Progress',
                        'Returned' => 'Returned',
                        'Cancelled' => 'Cancelled',

                    ]),
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('bin_id')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('delivery_address')
                    ->description(fn (Booking $record): string => 'Customer Name: '. $record->user->name)
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('bin.bin_name')
                    ->description(fn (Booking $record): string => 'Quantity : '. $record->quantity)
                    ->searchable(),

                Tables\Columns\TextColumn::make('booking_date')
                    ->date()
                    ->sortable(),
                // Tables\Columns\TextColumn::make('quantity')
                //     ->description(fn (Booking $record): string => 'Quantity '. $record->user->name)

                //     ->searchable(),

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
 
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'view' => Pages\ViewBooking::route('/{record}'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
