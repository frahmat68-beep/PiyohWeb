<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make(name)->required(),
            TextInput::make(email)->email()->required()->unique(ignoreRecord: true),
            TextInput::make(password)->password()->revealable()->required(fn (string $operation) => $operation === create)->dehydrated(fn ($state) => filled($state)),
            DateTimePicker::make(email_verified_at),
            Select::make(roles)->relationship(roles, name)->multiple()->preload()->searchable(),
        ]);
    }
}
