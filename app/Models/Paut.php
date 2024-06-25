<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paut extends Model
{
    use HasFactory;

    protected $table = 'paut';

    protected $fillable = [
        'nama_paud',
        'tahun_berdiri',
        'nama_yayasan',
        'jumlah_siswa',
        'jumlah_guru',
        'id_kecamatan',
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan');
    }
}
