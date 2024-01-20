<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static ?string $navigationGroup = 'Manage';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
                Forms\Components\Section::make('Create new user')
                ->description('Enter the user details here')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->maxLength(40),
                    Forms\Components\TextInput::make('email')
                        ->email()
                        ->unique(table: User::class, ignoreRecord: true)
                        ->required(),


                    Forms\Components\Select::make('role')
                        ->required()
                        ->options([
                            'ADMIN' => 'Admin',
                            'CUSTOMER' => 'Customer',
                            'EMPLOYEE' => 'Employee',
                        ]),
                    Forms\Components\TextInput::make('password')
                        ->type('password')
                        ->required()
                        ->minLength(8),
                ])

            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->sortable()
                ->searchable(),
                TextColumn::make('email')
                ->sortable()
                ->searchable(),
                TextColumn::make('role')
                   ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'ADMIN' => 'success',
                        'EMPLOYEE' => 'primary',
                        'CUSTOMER' => 'warning',
                        // 'rejected' => 'danger',
                    })
                    ->searchable(),                
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
