<?php

namespace App\Filament\SuperAdmin\Resources;

use App\Filament\SuperAdmin\Resources\ActivityResource\Pages;
use App\Models\Activity;
use Filament\Forms\Form;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ActivityResource extends Resource
{
    protected static ?string $model = Activity::class;

    protected static ?string $navigationIcon = 'heroicon-o-queue-list';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Section::make('User Data')
                ->schema([
                    TextEntry::make('user.username')
                        ->label('Username'),
                    TextEntry::make('user.email')
                        ->label('User Email'),
                ])->columns(2)
                ->icon('heroicon-o-user'),

            Section::make('LOG Data')
                ->schema([
                    TextEntry::make('log_message')
                        ->columnSpanFull(),
                    TextEntry::make('created_at'),
                ])->columns(2)
                    ->icon('heroicon-o-exclamation-triangle'),

            Section::make('Model Data')
                ->schema([
                    TextEntry::make('model'),
                    TextEntry::make('model_id'),
                ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.username')
                    ->label('Username'),
                Tables\Columns\TextColumn::make('log_message')
                    ->limit(100)
                    ->wrap(),
            ])
            ->filters([
                //
            ])
            ->actions([
            ])
            ->bulkActions([

            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListActivities::route('/'),
            'view' => Pages\ViewActivity::route('/{record}'),
        ];
    }
}
