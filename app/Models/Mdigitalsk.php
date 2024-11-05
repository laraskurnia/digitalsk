<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mdigitalsk extends Model
{
    use HasFactory;

     // Nama tabel 
     protected $table = 'digitalsk';


      // Kolom-kolom yang ada pada tabel
    protected $fillable = ['nama_file', 'file_pdf', 'tanggal_upload'];
}
