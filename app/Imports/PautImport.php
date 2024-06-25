<?php

namespace App\Imports;

use App\Models\Paut;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PautImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Paut([
            'nama_paud' => $row['nama_paud'],
            'tahun_berdiri' => $row['tahun_berdiri'],
            'nama_yayasan' => $row['nama_yayasan'],
            'jumlah_siswa' => $row['jumlah_siswa'],
            'jumlah_guru' => $row['jumlah_guru'],
        ]);
    }
}
