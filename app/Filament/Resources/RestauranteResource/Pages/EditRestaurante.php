<?php

namespace App\Filament\Resources\RestauranteResource\Pages;

use App\Filament\Resources\RestauranteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRestaurante extends EditRecord
{
    protected static string $resource = RestauranteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
