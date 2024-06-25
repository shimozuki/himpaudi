<?php

namespace App\Filament\Resources\DataGuruResource\Pages;

use App\Filament\Resources\DataGuruResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataGuruExport;

class ListDataGurus extends ListRecords
{
    protected static string $resource = DataGuruResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('export')
                ->label('Export to Excel')
                ->icon('heroicon-o-document-arrow-down')
                ->action('exportToExcel'),
        ];
    }

    public function exportToExcel()
    {
        return Excel::download(new DataGuruExport, 'data_gurus.xlsx');
    }
}
