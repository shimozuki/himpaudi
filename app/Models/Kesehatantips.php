<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kesehatantips extends Model
{
    use HasFactory;

    protected $table = 'tips_kesehatan';
    protected $fillable = [
        'judul',
        'deskripsi',
        'tipe',
        'image',
    ];
    protected $casts = [
        'tipe' => 'string',
    ];
}
