<?php

namespace App\Filament\Resources\Careers\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class CareerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),
                TextInput::make('department')
                    ->placeholder('Contoh: Kitchen, Service, Admin'),
                TextInput::make('location')
                    ->placeholder('Contoh: Galaxy, Bekasi, All Outlets'),
                Select::make('type')
                    ->options([
                        'full-time' => 'Full Time',
                        'part-time' => 'Part Time',
                        'contract' => 'Contract',
                        'internship' => 'Internship',
                    ])
                    ->required()
                    ->default('full-time'),
                Textarea::make('description')
                    ->required()
                    ->rows(6)
                    ->columnSpanFull(),
                Textarea::make('requirements')
                    ->rows(6)
                    ->placeholder('Tulis satu persyarat per baris')
                    ->columnSpanFull(),
                DatePicker::make('deadline'),
                Toggle::make('is_active')
                    ->required()
                    ->default(true),
            ]);
    }
}
