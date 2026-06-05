<?php

namespace App\Filament\Resources\MenuItems\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class MenuItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('menu_category_id')
                    ->relationship('category', 'name')
                    ->required(),
                TextInput::make('name')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('base_price')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->prefix('Rp'),
                Toggle::make('is_active')
                    ->required()
                    ->default(true),
                Toggle::make('is_featured')
                    ->required()
                    ->default(false),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                
                SpatieMediaLibraryFileUpload::make('image')
                    ->collection('image')
                    ->image()
                    ->columnSpanFull(),

                Repeater::make('outlets')
                    ->relationship('outlets')
                    ->schema([
                        Select::make('outlet_id')
                            ->relationship('outlets', 'name')
                            ->required()
                            ->label('Pilih Outlet'),
                        TextInput::make('price_override')
                            ->numeric()
                            ->label('Harga Khusus Outlet (Kosongkan jika sama dengan harga dasar)')
                            ->prefix('Rp'),
                        Toggle::make('is_available')
                            ->label('Tersedia di Outlet ini')
                            ->default(true),
                    ])
                    ->columnSpanFull()
                    ->grid(1)
                    ->collapsible()
                    ->label('Ketersediaan / Harga Spesifik Outlet')
            ]);
    }
}
