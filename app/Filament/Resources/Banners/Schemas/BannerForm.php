<?php

namespace App\Filament\Resources\Banners\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Schemas\Schema;

class BannerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('outlet_id')
                    ->relationship('outlet', 'name')
                    ->placeholder('Global / Semua Outlet'),
                TextInput::make('title')
                    ->required(),
                Textarea::make('subtitle')
                    ->columnSpanFull(),
                TextInput::make('cta_text'),
                TextInput::make('cta_url'),
                TextInput::make('location')
                    ->required()
                    ->default('home')
                    ->placeholder('Contoh: home, outlet, menu'),
                Toggle::make('is_active')
                    ->required()
                    ->default(true),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                SpatieMediaLibraryFileUpload::make('image')
                    ->collection('image')
                    ->image()
                    ->columnSpanFull(),
            ]);
    }
}
