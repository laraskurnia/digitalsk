<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPangkat extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang digunakan
    protected $table = 'pangkat';  // Ganti dengan nama tabel yang benar

    // Tentukan kolom yang bisa diisi secara massal
    protected $fillable = [
        'nama',
        'periode',
        'pangkat_lama',
        'pangkat_baru',
        'jabatan',
    ];
}

