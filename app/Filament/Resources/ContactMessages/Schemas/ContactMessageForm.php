<?php

namespace App\Filament\Resources\ContactMessages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ContactMessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->disabled()
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->disabled()
                    ->required(),
                TextInput::make('phone')
                    ->disabled()
                    ->tel(),
                TextInput::make('subject')
                    ->disabled(),
                Textarea::make('message')
                    ->required()
                    ->disabled()
                    ->columnSpanFull(),
                Toggle::make('is_read')
                    ->required()
                    ->label('Telah Dibaca / Diproses'),
            ]);
    }
}
