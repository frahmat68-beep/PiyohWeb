<?php

namespace App\Console\Commands;

use App\Services\MasterDataSyncService;
use Illuminate\Console\Command;

class SyncMasterDataCommand extends Command
{
    protected $signature = 'master-data:sync';
    protected $description = 'Sync outlets, categories, products, and prices from Website to PiyohPOS';

    public function handle(MasterDataSyncService $syncService): int
    {
        $this->info('Starting Master Data Sync to PiyohPOS...');

        $result = $syncService->sync();

        if ($result['success']) {
            $this->info($result['message']);
            $this->line(json_encode($result['response'], JSON_PRETTY_PRINT));

            return Command::SUCCESS;
        }

        $this->error($result['message']);

        return Command::FAILURE;
    }
}
