<?php

namespace App\Filament\Admin\Resources;

use App\Enums\UserRole;
use App\Filament\SuperAdmin\Resources\UserResource\Pages;
use App\Filament\SuperAdmin\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->unique(ignoreRecord: true),
                TextInput::make('email')
                    ->email()
                    ->unique(ignoreRecord: true),
                TextInput::make('password')
                    ->password()
                    ->revealable(),
                Select::make('role')
                    ->enum(UserRole::class)
                    ->options(UserRole::class)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('email'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
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
            'index' => \App\Filament\Admin\Resources\Pages\ListUsers::route('/'),
            'create' => \App\Filament\Admin\Resources\Pages\CreateUser::route('/create'),
            'edit' => \App\Filament\Admin\Resources\Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
