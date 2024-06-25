<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSiswa extends Model
{
    use HasFactory;
    protected $table = 'data_siswa';

    protected $fillable = [
        'nama',
        'nisn',
        'tempat_tanggal_lahir',
        'alamat',
        'agama',
        'no_tlpn_wali',
        'jenis_kelamin',
        'nama_wali',
        'id_paut',
    ];

    // Relationship with Paut model
    public function paut()
    {
        return $this->belongsTo(Paut::class, 'id_paut');
    }
}
