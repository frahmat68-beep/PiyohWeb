<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Schedule backup to run daily at 05:00 AM WIB (22:00 UTC)
Schedule::command('backup:run')->dailyAt('22:00');
// Local cleanups for old backups at 06:00 AM WIB (23:00 UTC)
Schedule::command('backup:clean')->dailyAt('23:00');
