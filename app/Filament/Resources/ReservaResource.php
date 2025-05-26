<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReservaResource\Pages;
use App\Filament\Resources\ReservaResource\RelationManagers;
use App\Models\Reserva;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReservaResource extends Resource
{
    protected static ?string $model = Reserva::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('usuario.email')
                    ->label('Usuario')
                    ->searchable()
                    ->alignment('center'),

                TextColumn::make('apartamento.descripcion')
                    ->label('Apartamento')
                    ->searchable()
                    ->formatStateUsing(fn ($state) => preg_replace('/[^0-9]/', '', $state))
                    ->alignment('center'),

                TextColumn::make('fecha_inicio')
                    ->label('Desde')
                    ->date('d/m/Y')
                    ->alignment('center'),

                TextColumn::make('fecha_fin')
                    ->label('Hasta')
                    ->date('d/m/Y')
                    ->alignment('center'),

                TextColumn::make('estado')
                    ->label('Estado')
                    ->badge()
                    ->color(fn (string $state): string => match (strtolower($state)) {
                        'pendiente' => 'warning',
                        'confirmada' => 'success',
                        default => 'gray',
                    })
                    ->alignment('center'),

                TextColumn::make('total')
                    ->label('Precio Total')
                    ->money('eur', true)
                    ->alignment('center'),

                TextColumn::make('personas')
                    ->label('Personas')
                    ->alignment('center'),
            ])
            ->actions([
                Action::make('alternar_estado')
                    ->label(fn ($record) => $record->estado === 'Confirmada' ? 'Volver a Pendiente' : 'Confirmar')
                    ->icon(fn ($record) => $record->estado === 'Confirmada' ? 'heroicon-m-arrow-uturn-left' : 'heroicon-m-check-circle')
                    ->color(fn ($record) => $record->estado === 'Confirmada' ? 'warning' : 'success')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $record->estado = $record->estado === 'Confirmada' ? 'Pendiente' : 'Confirmada';
                        $record->save();
                    }),
                Action::make('borrar')
                    ->label('Borrar')
                    ->icon('heroicon-m-trash')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $record->delete();
                    }),

//                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    public static function canCreate(): bool
    {
        return false;
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
            'index' => Pages\ListReservas::route('/'),
            'create' => Pages\CreateReserva::route('/create'),
            'edit' => Pages\EditReserva::route('/{record}/edit'),
        ];
    }
}
