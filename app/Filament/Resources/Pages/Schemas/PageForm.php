<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required()
                    ->disabledOn('edit'),
                Textarea::make('meta_title')
                    ->columnSpanFull(),
                Textarea::make('meta_description')
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->required()
                    ->default(true),
                
                Repeater::make('sections')
                    ->relationship('sections')
                    ->schema([
                        TextInput::make('key')
                            ->required()
                            ->disabledOn('edit'),
                        Select::make('type')
                            ->options([
                                'text' => 'Plain Text',
                                'textarea' => 'Paragraph / Textarea',
                                'html' => 'HTML / Rich Content',
                            ])
                            ->required(),
                        Textarea::make('value')
                            ->rows(4)
                            ->required(),
                    ])
                    ->columnSpanFull()
                    ->grid(1)
                    ->collapsible()
                    ->defaultItems(0)
            ]);
    }
}
