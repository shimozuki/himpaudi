<x-filament::card class="max-w-lg">
    <x-slot name="title">
        Import Data from Excel
    </x-slot>

    <x-filament::form wire:submit.prevent="import">
        <x-form-file name="file" label="Choose Excel file" accept=".xlsx,.xls">
            <x-filament::button type="submit">Import</x-filament::button>
        </x-form-file>
    </x-filament::form>
</x-filament::card>
