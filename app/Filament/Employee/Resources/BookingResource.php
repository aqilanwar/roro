<?php

namespace App\Filament\Employee\Resources;

use App\Filament\Employee\Resources\BookingResource\Pages;
use App\Filament\Employee\Resources\BookingResource\RelationManagers;
use App\Filament\Employee\Resources\BookingResource\RelationManagers\BookingBinRelationManager;
use App\Models\Booking;
use Filament\Forms\Components\Grid;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;
    protected static ?string $navigationLabel = 'Customer Booking';
    protected static ?string $modelLabel = 'Customer Booking';

    protected static ?string $navigationIcon = 'heroicon-o-bookmark';

    public static function canCreate(): bool
    {
       return false;
    }
    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Manage customer booking')
                ->description('You can update the booking status.')
                ->schema([

                    Grid::make(2)
                        ->schema([
                            Forms\Components\Select::make('payment_status')
                            ->required()
                            ->disabledOn('edit') 

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
                        ]),
                    Forms\Components\DatePicker::make('booking_date')
                        ->disabledOn('edit') 
                        ->required(),
                    Forms\Components\TextInput::make('delivery_address')
                        ->disabledOn('edit') 
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('phone_number')
                        ->disabledOn('edit') 
                        ->required()
                        ->maxLength(255),


                    
                ])

                    
                // Forms\Components\TextInput::make('user')
                //     ->required()
                //     ->maxLength(255),
 
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
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
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            BookingBinRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            // 'create' => Pages\CreateBooking::route('/create'),
            'view' => Pages\ViewBooking::route('/{record}'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
