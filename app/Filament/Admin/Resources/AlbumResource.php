<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\AlbumResource\Pages;
use App\Filament\Admin\Resources\AlbumResource\RelationManagers\PicturesRelationManager;
use App\Models\Album;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
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
                Group::make([
                    TextInput::make('name'),
                ])
                    ->columnSpanFull(),
                MarkdownEditor::make('description')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([

            ]);
    }

    public static function getRelations(): array
    {
        return [
            PicturesRelationManager::class,
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('name'),
                Section::make('Description')
                    ->schema([
                        TextEntry::make('description')
                            ->markdown()
                            ->columnSpanFull()
                            ->label(''),
                    ]),
                Section::make('Info')
                    ->schema([
                        TextEntry::make('created_at'),
                        TextEntry::make('updated_at'),
                    ])->columns(2),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Admin\Resources\AlbumResource\Pages\ListAlbums::route('/'),
            'create' => \App\Filament\Admin\Resources\AlbumResource\Pages\CreateAlbum::route('/create'),
            'edit' => \App\Filament\Admin\Resources\AlbumResource\Pages\EditAlbum::route('/{record}/edit'),
            'view' => \App\Filament\Admin\Resources\AlbumResource\Pages\ViewAlbum::route('/{record}/view'),
        ];
    }
}
