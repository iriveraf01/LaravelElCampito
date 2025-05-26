<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CartaResource\Pages;
use App\Filament\Resources\CartaResource\RelationManagers;
use App\Models\Carta;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Illuminate\Support\HtmlString;

class CartaResource extends Resource
{
    protected static ?string $model = \App\Models\Carta::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nombre_plato')
                ->required()
                ->maxLength(100),
            Forms\Components\Textarea::make('descripcion'),
            Forms\Components\TextInput::make('precio_racion')
                ->numeric()
                ->required(),
            Forms\Components\TextInput::make('precio_media_racion')
                ->numeric(),
            Forms\Components\TextInput::make('categoria')->maxLength(50),
            Forms\Components\FileUpload::make('imagen')
                ->image()
                ->directory('images/platos')
                ->disk('public')
                ->preserveFilenames()
                ->nullable()
                ->dehydrated(fn ($state) => filled($state)),
            Forms\Components\TextInput::make('estilo_preparacion')->maxLength(50),
            Forms\Components\Select::make('restaurante_id')
                ->relationship('restaurante', 'nombre')
                ->searchable()
                ->default(1),
            Forms\Components\TextInput::make('alergenos')
                ->maxLength(255)
                ->nullable()
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('nombre_plato')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('precio_racion')->money('eur'),
            Tables\Columns\TextColumn::make('categoria'),
            Tables\Columns\TextColumn::make('restaurante.nombre')->label('Restaurante'),
            Tables\Columns\ImageColumn::make('imagen')
                ->label('Imagen')
                ->disk('public'),
        ])->filters([
            //
        ])->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCartas::route('/'),
            'create' => Pages\CreateCarta::route('/create'),
            'edit' => Pages\EditCarta::route('/{record}/edit'),
        ];
    }
}
