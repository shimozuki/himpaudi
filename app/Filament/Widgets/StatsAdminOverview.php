<?php

namespace App\Filament\Widgets;

use App\Models\Anak;
use App\Models\DataGuru;
use App\Models\DataSiswa;
use App\Models\Paut;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsAdminOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Paut', DataGuru::query()->count()),
            Stat::make('Total Guru', Paut::query()->count()),
            Stat::make('Total Anak', DataSiswa::query()->count()),
        ];
    }
}
