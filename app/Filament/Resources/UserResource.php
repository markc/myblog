<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Administration';

    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('User Details')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                        Forms\Components\TextInput::make('password')
                            ->password()
                            ->dehydrateStateUsing(fn ($state) => ! empty($state) ? Hash::make($state) : null
                            )
                            ->dehydrated(fn ($state) => filled($state))
                            ->required(fn (string $operation): bool => $operation === 'create'),
                        Forms\Components\DateTimePicker::make('email_verified_at')
                            ->label('Email Verified At')
                            ->helperText('Leave empty if email is not verified.')
                            ->nullable(),
                    ]),
                Forms\Components\Section::make('Permissions')
                    ->schema([
                        Forms\Components\Toggle::make('is_admin')
                            ->label('Administrator')
                            ->helperText('Administrators have full access to all areas'),
                        Forms\Components\Toggle::make('can_post')
                            ->label('Can Create Posts')
                            ->helperText('Allow user to create blog posts'),
                        Forms\Components\Toggle::make('can_edit_others')
                            ->label('Can Edit Others\' Posts')
                            ->helperText('Allow user to edit posts created by other users'),
                        Forms\Components\Toggle::make('can_moderate')
                            ->label('Can Moderate Comments')
                            ->helperText('Allow user to moderate blog comments'),
                    ]),
                Forms\Components\Section::make('Profile')
                    ->schema([
                        Forms\Components\FileUpload::make('profile_photo_path')
                            ->label('Profile Photo')
                            ->image()
                            ->directory('profile-photos')
                            ->visibility('public')
                            ->maxSize(1024)
                            ->helperText('Maximum size: 1MB. Accepted formats: .jpg, .jpeg, .png')
                            ->nullable(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('profile_photo_path')
                    ->label('Photo')
                    ->circular()
                    ->defaultImageUrl(fn (User $record): string => 'https://ui-avatars.com/api/?name='.urlencode($record->name).'&color=FFFFFF&background=FB8C00')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('email_verified_at')
                    ->label('Verified')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_admin')
                    ->label('Admin')
                    ->boolean()
                    ->trueIcon('heroicon-o-shield-check')
                    ->sortable(),
                Tables\Columns\IconColumn::make('can_post')
                    ->label('Author')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\IconColumn::make('can_moderate')
                    ->label('Moderator')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\Filter::make('administrators')
                    ->query(fn (Builder $query): Builder => $query->where('is_admin', true))
                    ->label('Administrators'),
                Tables\Filters\Filter::make('verified')
                    ->query(fn (Builder $query): Builder => $query->whereNotNull('email_verified_at'))
                    ->label('Verified Users'),
                Tables\Filters\Filter::make('unverified')
                    ->query(fn (Builder $query): Builder => $query->whereNull('email_verified_at'))
                    ->label('Unverified Users'),
                Tables\Filters\Filter::make('authors')
                    ->query(fn (Builder $query): Builder => $query->where('can_post', true))
                    ->label('Content Authors'),
                Tables\Filters\Filter::make('moderators')
                    ->query(fn (Builder $query): Builder => $query->where('can_moderate', true))
                    ->label('Comment Moderators'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('verify')
                        ->label('Mark as Verified')
                        ->icon('heroicon-o-check-badge')
                        ->action(fn (Collection $records) => $records->each->update(['email_verified_at' => now()]))
                        ->deselectRecordsAfterCompletion()
                        ->requiresConfirmation(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Add relations if needed, like posts
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
