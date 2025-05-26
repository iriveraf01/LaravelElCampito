<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InstalacionesResource\Pages;
use App\Filament\Resources\InstalacionesResource\RelationManagers;
use App\Models\Instalaciones;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InstalacionesResource extends Resource
{
    protected static ?string $model = Instalaciones::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(100),
                Forms\Components\Textarea::make('descripcion')
                    ->rows(5)
                    ->required(),
                Forms\Components\FileUpload::make('imagenes')
                    ->image()
                    ->multiple()
                    ->enableReordering()
                    ->directory('instalaciones')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('descripcion')->limit(50),
                Tables\Columns\ImageColumn::make('imagenes.0')->rounded(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInstalaciones::route('/'),
            'create' => Pages\CreateInstalaciones::route('/create'),
            'edit' => Pages\EditInstalaciones::route('/{record}/edit'),
        ];
    }
}
