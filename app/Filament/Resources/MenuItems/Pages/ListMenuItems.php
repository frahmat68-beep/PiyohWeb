<?php

namespace App\Filament\Resources\MenuItems\Pages;

use App\Filament\Resources\MenuItems\MenuItemResource;
use App\Services\MasterDataSyncService;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ListMenuItems extends ListRecords
{
    protected static string $resource = MenuItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('syncToPos')
                ->label('Sync ke PiyohPOS')
                ->icon('heroicon-o-arrow-path')
                ->color('success')
                ->requiresConfirmation()
                ->modalHeading('Sinkronisasi Master Data ke PiyohPOS')
                ->modalDescription('Proses ini akan memperbarui data seluruh Menu, Kategori, Outlet, dan Foto ke sistem PiyohPOS secara langsung.')
                ->modalSubmitActionLabel('Ya, Sinkronkan Sekarang')
                ->action(function (MasterDataSyncService $syncService) {
                    $result = $syncService->sync();

                    if ($result['success']) {
                        Notification::make()
                            ->title('Sinkronisasi Berhasil!')
                            ->body($result['message'])
                            ->success()
                            ->duration(6000)
                            ->send();
                    } else {
                        Notification::make()
                            ->title('Sinkronisasi Gagal')
                            ->body($result['message'])
                            ->danger()
                            ->duration(8000)
                            ->send();
                    }
                }),

            CreateAction::make(),
        ];
    }
}
