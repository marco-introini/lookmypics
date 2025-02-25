<?php

namespace App\Filament\Admin\Resources;

use App\Enums\UserRole;
use App\Filament\Admin\Resources\UserResource\Pages\CreateUser;
use App\Filament\Admin\Resources\UserResource\Pages\EditUser;
use App\Filament\Admin\Resources\UserResource\Pages\ListUsers;
use App\Models\User;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Override;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    #[Override]
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
                Fieldset::make('Warning Area')
                    ->schema([
                        TextInput::make('password')
                            ->password()
                            ->revealable(),
                        Select::make('role')
                            ->enum(UserRole::class)
                            ->options(UserRole::class)
                            ->required(),
                        DateTimePicker::make('email_verified_at'),
                    ])->columns(3),
                Fieldset::make('Creation Information')
                    ->schema([
                        Placeholder::make('created_at')
                            ->content(fn (User $record) => $record->created_at?->format('Y-m-d H:i:s')),
                        Placeholder::make('updated_at')
                            ->content(fn (User $record) => $record->updated_at?->format('Y-m-d H:i:s')),
                    ])
                    ->columns(),
            ]);
    }

    #[\Override]
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('role')
                    ->badge()
                    ->label('Role')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('role')
                    ->label('Role')
                    ->options(UserRole::class),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
            ]);
    }

    #[\Override]
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    #[\Override]
    public static function getPages(): array
    {
        return [
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }
}
