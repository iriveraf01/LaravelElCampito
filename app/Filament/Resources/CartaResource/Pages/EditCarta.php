<?php

namespace App\Filament\Resources\CartaResource\Pages;

use App\Filament\Resources\CartaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCarta extends EditRecord
{
    protected static string $resource = CartaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
