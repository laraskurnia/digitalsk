<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MDigitalsk; // Pastikan namespace benar

class DigitalSkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menambahkan data sesuai dengan kolom yang ada di tabel digitalsk
        MDigitalsk::create([
            'nama_file' => 'contoh_file_1', // Nama file sesuai
            'file_pdf' => 'path/to/file1.pdf', // Path atau URL ke file PDF
            'tanggal_upload' => now(), // Menggunakan tanggal upload sekarang
        ]);

        // Tambahkan data lain jika diperlukan
        MDigitalsk::create([
            'nama_file' => 'contoh_file_2',
            'file_pdf' => 'path/to/file2.pdf',
            'tanggal_upload' => now(),
        ]);
    }
}
