<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MPangkat;

class PangkatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MPangkat::create([
            'nama' => 'Pangkat 1',          // Ganti dengan nama pangkat sesuai
            'periode' => '2023',            // Ganti dengan periode yang sesuai
            'pangkat_lama' => 'Jabatan Lama', // Ganti dengan pangkat lama
            'pangkat_baru' => 'Jabatan Baru', // Ganti dengan pangkat baru
            'jabatan' => 'Manager',         // Ganti dengan jabatan sesuai
        ]);

        // Tambahkan data lain jika diperlukan
        MPangkat::create([
            'nama' => 'Pangkat 2',
            'periode' => '2024',
            'pangkat_lama' => 'Senior Manager',
            'pangkat_baru' => 'Manager',
            'jabatan' => 'Senior Manager',
        ]);
    }
}
