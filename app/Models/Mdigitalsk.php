<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mdigitalsk extends Model
{
    use HasFactory;

    // Tentukan nama tabel secara eksplisit
    protected $table = 'digitalsk';  // Tabel yang benar di database

    // Tentukan kolom yang bisa diisi secara massal
    protected $fillable = [
        'nama_file',
        'file_pdf',
        'tanggal_upload',
    ];
}
