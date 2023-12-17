<?php

namespace App\Filament\SuperAdmin\Resources;

use Closure;
use App\Filament\SuperAdmin\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('username')
                    ->unique(ignoreRecord: true)
                    ->maxLength(20)
                    ->regex('/^[a-zA-Z0-9-_]+$/'),
                Forms\Components\TextInput::make('email'),
                Forms\Components\TextInput::make('name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('username')
                    ->searchable()
                    ->sortable()
                    ->icon(fn(User $record) => $record->isSuperAdmin() ? 'heroicon-o-exclamation-triangle' : '')
                    ->color(fn(User $record) => $record->isSuperAdmin() ? 'danger' : ''),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->color(fn(User $record) => $record->isSuperAdmin() ? 'danger' : ''),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable()
                    ->color(fn(User $record) => $record->isSuperAdmin() ? 'danger' : ''),
                Tables\Columns\IconColumn::make('verified')
                    ->boolean(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                TernaryFilter::make('email_verified_at')
                    ->nullable()
                    ->label('Verified')
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make()
                        ->color('warning'),
                    Action::make('Force Password')
                        ->icon('heroicon-o-lifebuoy')
                        ->color('danger')
                        ->form([
                            Forms\Components\TextInput::make('password')
                                ->password()
                                ->maxLength(20)
                                ->minLength(5)
                                ->required(),
                        ])
                        ->action(function (array $data, User $user) {
                            $user->forceFill([
                                'password' => Hash::make($data['password']),
                            ])->save();

                            Notification::make('confirm')
                                ->title('Password updated')
                                ->success()
                                ->send();
                        }),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
