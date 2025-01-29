<?php

namespace Database\Seeders;

use App\Models\User; 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'admin',
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'level' => 'admin',
                'password' => Hash::make('123456')
            ],
            [
                'username' => 'user1',
                'name' => 'Akun User1',
                'email' => 'user1@gmail.com',
                'level' => 'user',
                'password' => Hash::make('123456')
            ],
            [
                'username' => 'user2',
                'name' => 'Akun User2',
                'email' => 'user2@gmail.com',
                'level' => 'user',
                'password' => Hash::make('123456')
            ],
        ];

        foreach ($users as $user) {
            // Cek jika username sudah ada, jika tidak maka buat data baru
            if (!User::where('username', $user['username'])->exists()) {
                User::create($user);
            }
        }
    }
}
