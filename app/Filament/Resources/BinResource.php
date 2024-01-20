<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BinResource\Pages;
use App\Filament\Resources\BinResource\RelationManagers;
use App\Models\Bin;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;

use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class BinResource extends Resource
{
    protected static ?string $model = Bin::class;

    protected static ?string $navigationIcon = 'heroicon-o-trash';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
                Forms\Components\Section::make('Create new bin')
                ->description('Enter the bin details here')
                ->schema([
                    Forms\Components\TextInput::make('bin_name')
                        ->required()
                        ->maxLength(40),
                    Forms\Components\TextInput::make('quantity')
                        ->numeric()
                        ->inputMode('decimal')
                        ->required()
                        ->maxLength(5),
                    Forms\Components\TextInput::make('price')
                        ->currencyMask(thousandSeparator: ',',decimalSeparator: '.',precision: 2)                    
                        ->required()
                        ->maxLength(9),
                    RichEditor::make('description')

                        ->columnSpanFull()
                        ->disableToolbarButtons([
                            'blockquote',
                            'strike',
                            'attachFiles',
                        ]),
                    FileUpload::make('image')
                        ->image()
                        ->imageEditor()
                        ->moveFiles()
                        ->columnSpanFull()
                        ->enableReordering()
                        ->multiple()
                        ->required(),
                ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('bin_name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('description')
                    ->sortable()
                    ->sortable()
                    ->searchable()
                    ->html(),
                TextColumn::make('quantity')
                    ->sortable(),
                TextColumn::make('price')    
                    ->money('MYR')
                    ->sortable(),
                ImageColumn::make('image')
                    ->circular()
                    ->stacked()



            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListBins::route('/'),
            'create' => Pages\CreateBin::route('/create'),
            'view' => Pages\ViewBin::route('/{record}'),
            'edit' => Pages\EditBin::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
