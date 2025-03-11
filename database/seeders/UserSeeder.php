<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'admin',
                'username' => 'admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make('1234'),
                'role' => 'admin'
            ],
            [
                'name' => 'guru',
                'username' => 'guru',
                'email' => 'guru@mail.com',
                'password' => Hash::make('1234'),
                'role' => 'guru'
            ],
            [
                'name' => 'siswa',
                'username' => 'siswa',
                'email' => 'siswa@mail.com',
                'password' => Hash::make('1234'),
                'role' => 'siswa'
            ]
        ];
        
        foreach ($data as $user) {
            User::create($user);
        }
    }
}
