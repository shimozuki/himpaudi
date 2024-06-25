<?php

namespace App\Filament\Resources\PautResource\Pages;

use App\Filament\Resources\PautResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PautExport;
use App\Imports\PautImport; // Import class untuk import data
use Filament\FileUploads\FileUpload;

class ListPauts extends ListRecords
{
    protected static string $resource = PautResource::class;
    
    protected static ?string $title = 'Data Paud';
    
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
        return Excel::download(new PautExport, 'paut.xlsx');
    }
}
