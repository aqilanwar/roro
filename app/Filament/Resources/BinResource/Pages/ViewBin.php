<?php

namespace App\Filament\Resources\BinResource\Pages;

use App\Filament\Resources\BinResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBin extends ViewRecord
{
    protected static string $resource = BinResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
