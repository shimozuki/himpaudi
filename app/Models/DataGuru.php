<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataGuru extends Model
{
    use HasFactory;

    protected $table = 'data_guru';

    protected $fillable = [
        'nama',
        'nip',
        'alamat',
        'no_tlpn',
        'jenis_kelamin',
        'status',
        'id_paut',
    ];

    // Relationship with Paut model
    public function paut()
    {
        return $this->belongsTo(Paut::class, 'id_paut');
    }
}
