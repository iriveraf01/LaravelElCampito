<?php

namespace App\Filament\Resources\ApartamentoResource\Pages;

use App\Filament\Resources\ApartamentoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditApartamento extends EditRecord
{
    protected static string $resource = ApartamentoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
