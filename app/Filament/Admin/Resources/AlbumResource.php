<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\AlbumResource\Pages;
use App\Models\Album;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AlbumResource extends Resource
{
    protected static ?string $model = Album::class;

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
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => \App\Filament\Admin\Resources\AlbumResource\Pages\ListAlbums::route('/'),
            'create' => \App\Filament\Admin\Resources\AlbumResource\Pages\CreateAlbum::route('/create'),
            'edit' => \App\Filament\Admin\Resources\AlbumResource\Pages\EditAlbum::route('/{record}/edit'),
        ];
    }
}
