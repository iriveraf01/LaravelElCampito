<?php

namespace App\Filament\Resources\ApartamentoResource\Pages;

use App\Filament\Resources\ApartamentoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListApartamentos extends ListRecords
{
    protected static string $resource = ApartamentoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
