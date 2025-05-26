<?php

namespace App\Filament\Resources\InstalacionesResource\Pages;

use App\Filament\Resources\InstalacionesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInstalaciones extends EditRecord
{
    protected static string $resource = InstalacionesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
