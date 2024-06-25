<?php

namespace App\Exports;

use App\Models\DataSiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataSiswaExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DataSiswa::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'NISN',
            'Tempat Tanggal Lahir',
            'Alamat',
            'Agama',
            'No Telepon Wali',
            'Jenis Kelamin',
            'Nama Wali',
            'ID PAUT',
            'Created At',
            'Updated At',
        ];
    }
}
