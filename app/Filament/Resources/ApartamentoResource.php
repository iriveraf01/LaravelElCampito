<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApartamentoResource\Pages;
use App\Filament\Resources\ApartamentoResource\RelationManagers;
use App\Models\Apartamento;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ApartamentoResource extends Resource
{
    protected static ?string $model = Apartamento::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Grid::make(2)->schema([
                TextInput::make('descripcion')
                    ->label('Descripción')
                    ->required()
                    ->columnSpan(2),

                TextInput::make('precio')
                    ->label('Precio (€)')
                    ->numeric()
                    ->required(),

                TextInput::make('capacidad')
                    ->label('Capacidad (personas)')
                    ->numeric()
                    ->required(),

                FileUpload::make('imagenes')
                    ->label('Imágenes del apartamento')
                    ->multiple()
                    ->reorderable()
                    ->preserveFilenames()
                    ->directory('apartamentos')
                    ->disk('public')
                    ->columnSpan(2)
                    ->dehydrated(true) // importante: para guardar el valor actualizado
                    ->formatStateUsing(fn ($state) => is_array($state) ? $state : []) // asegura que se procese correctamente
                    ->storeFiles() // hace que almacene archivos y devuelva rutas relativas
            ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('descripcion')->limit(13),
            TextColumn::make('precio')->suffix(' €'),
            TextColumn::make('capacidad')->label('Capacidad'),
            ImageColumn::make('imagenes.0')->label('Imagen'),
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
            'index' => Pages\ListApartamentos::route('/'),
            'create' => Pages\CreateApartamento::route('/create'),
            'edit' => Pages\EditApartamento::route('/{record}/edit'),
        ];
    }
}
