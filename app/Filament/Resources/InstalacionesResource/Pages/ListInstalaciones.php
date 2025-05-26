<?php

namespace App\Filament\Resources\InstalacionesResource\Pages;

use App\Filament\Resources\InstalacionesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInstalaciones extends ListRecords
{
    protected static string $resource = InstalacionesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
