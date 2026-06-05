<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('key')
                    ->required()
                    ->disabledOn('edit'),
                TextInput::make('label')
                    ->required(),
                Select::make('group')
                    ->options([
                        'general' => 'General',
                        'contact' => 'Contact Info',
                        'social' => 'Social Media',
                        'seo' => 'SEO Default',
                    ])
                    ->required()
                    ->default('general'),
                Select::make('type')
                    ->options([
                        'text' => 'Single Line Text',
                        'textarea' => 'Paragraph / Textarea',
                        'boolean' => 'True / False Toggle',
                    ])
                    ->required()
                    ->default('text'),
                Textarea::make('value')
                    ->rows(4)
                    ->columnSpanFull(),
            ]);
    }
}
