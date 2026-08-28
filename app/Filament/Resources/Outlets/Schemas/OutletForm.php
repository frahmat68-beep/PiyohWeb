<?php

namespace App\Filament\Resources\Outlets\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Schemas\Schema;

class OutletForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Outlet')
                    ->placeholder('Contoh: Piyoh Kopi Galaxy')
                    ->required(),
                TextInput::make('slug')
                    ->label('Slug URL')
                    ->placeholder('Contoh: galaxy')
                    ->required(),
                Textarea::make('description')
                    ->label('Deskripsi Singkat Outlet')
                    ->placeholder('Deskripsi suasana, fasilitas, dan keunggulan cabang...')
                    ->rows(3)
                    ->columnSpanFull(),
                TextInput::make('city')
                    ->label('Kota')
                    ->placeholder('Contoh: Bekasi'),
                TextInput::make('address')
                    ->label('Alamat Lengkap')
                    ->placeholder('Contoh: Jl. Lotus Timur RSO D No. 31, Jaka Setia'),
                TextInput::make('opening_hours')
                    ->label('Jam Operasional')
                    ->placeholder('Setiap Hari: 08:00 - 23:30 WIB')
                    ->helperText('Status Buka/Tutup otomatis dihitung dari jam operasional ini.')
                    ->columnSpanFull(),
                TextInput::make('phone')
                    ->label('Nomor Telepon')
                    ->placeholder('Contoh: 0812-3999-9731')
                    ->tel(),
                TextInput::make('whatsapp')
                    ->label('WhatsApp (Nomor dengan kode 62)')
                    ->placeholder('Contoh: 6281239999731'),
                TextInput::make('email')
                    ->label('Alamat Email')
                    ->email(),
                TextInput::make('google_maps_url')
                    ->label('Link Google Maps / Waze')
                    ->url(),
                TextInput::make('instagram_url')
                    ->label('Link Instagram')
                    ->url(),
                TextInput::make('sort_order')
                    ->label('Urutan Tampilan')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->label('Outlet Aktif')
                    ->helperText('Jika dinonaktifkan, outlet tidak akan muncul di publik.')
                    ->required()
                    ->default(true),
                SpatieMediaLibraryFileUpload::make('photo')
                    ->label('Foto Utama Cabang Outlet')
                    ->collection('photo')
                    ->image()
                    ->imageEditor()
                    ->helperText('Upload foto outlet (JPG/PNG). Foto ini langsung menggantikan tampilan outlet di website tanpa perlu coding.')
                    ->columnSpanFull(),
            ]);
    }
}
