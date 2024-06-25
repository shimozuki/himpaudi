<x-filament::card class="max-w-lg">
    <x-slot name="title">
        Import Data from Excel
    </x-slot>

    <form wire:submit.prevent="import">
        <x-filament::form-file name="file" label="Choose Excel file" accept=".xlsx,.xls">
            <x-filament::button type="submit">Import</x-filament::button>
        </x-filament::form-file>
    </form>
</x-filament::card>
