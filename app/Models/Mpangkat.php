<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mpangkat extends Model
{
    use HasFactory;
    protected $table = 'pangkat';
    protected $fillable = ['nama', 'periode', 'pangkat_lama', 'pangkat_baru', 'jabatan'];
}
