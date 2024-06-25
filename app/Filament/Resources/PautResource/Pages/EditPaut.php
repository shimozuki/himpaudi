<?php

namespace App\Filament\Resources\PautResource\Pages;

use App\Filament\Resources\PautResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPaut extends EditRecord
{
    protected static string $resource = PautResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
