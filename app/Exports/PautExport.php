<?php

namespace App\Exports;

use App\Models\Paut;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PautExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Paut::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama PAUD',
            'Tahun Berdiri',
            'Nama Yayasan',
            'Jumlah Siswa',
            'Jumlah Guru',
            'Created At',
            'Updated At',
        ];
    }
}
