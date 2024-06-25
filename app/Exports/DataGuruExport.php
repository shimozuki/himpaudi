<?php

namespace App\Exports;

use App\Models\DataGuru;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataGuruExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DataGuru::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'NIP',
            'Alamat',
            'No Telepon',
            'Jenis Kelamin',
            'Status',
            'ID PAUT',
            'Created At',
            'Updated At',
        ];
    }
}
