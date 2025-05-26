<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RestauranteResource\Pages;
use App\Models\Restaurante;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RestauranteResource extends Resource
{
    protected static ?string $model = Restaurante::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    /**
     * Solo permite crear un restaurante si no existe ninguno.
     */
    public static function canCreate(): bool
    {
        return Restaurante::count() === 0;
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(2)->schema([
                TextInput::make('nombre')
                    ->label('Nombre')
                    ->required()
                    ->columnSpan(2),

                TextInput::make('descripcion')
                    ->label('Descripción')
                    ->columnSpan(2),

                TextInput::make('horario')
                    ->label('Horario')
                    ->columnSpan(2),

                FileUpload::make('imagenes')
                    ->label('Imágenes del restaurante')
                    ->multiple()
                    ->reorderable()
                    ->preserveFilenames()
                    ->directory('restaurante')
                    ->disk('public')
                    ->columnSpan(2)
                    ->dehydrated(true)
                    ->formatStateUsing(fn ($state) => is_array($state) ? $state : [])
                    ->storeFiles()
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('nombre')->limit(20),
            TextColumn::make('descripcion')->limit(30),
            TextColumn::make('horario')->limit(20),
        ])->filters([
            //
        ])->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRestaurantes::route('/'),
            'create' => Pages\CreateRestaurante::route('/create'),
            'edit' => Pages\EditRestaurante::route('/{record}/edit'),
        ];
    }
}
