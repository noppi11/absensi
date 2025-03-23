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
            ],
            [
                'name' => 'Violet Evergarden',
                'username' => 'violet_evg',
                'email' => 'violetevg2@gmail.com',
                'password' => Hash::make('1234'),
                'role' => 'siswa',
                'id_kelas' => 1,
                'nis' => '8994'
            ],
            [
                'name' => 'Yamauchi Sakura',
                'username' => 'ymcsakuraa',
                'email' => 'sakuraymcc22@gmail.com',
                'password' => Hash::make('1234'),
                'role' => 'siswa',
                'id_kelas' => 1,
                'nis' => '8994'
            ],
            [
                'name' => 'Hayase Mikawa',
                'username' => 'hysmiikw',
                'email' => 'hayasemkw1@gmail.com',
                'password' => Hash::make('1234'),
                'role' => 'siswa',
                'id_kelas' => 2,
                'nis' => '8994'
            ],
            [
                'name' => 'Ai Shizou',
                'username' => 'aishhh',
                'email' => 'shizouaa1@gmail.com',
                'password' => Hash::make('1234'),
                'role' => 'siswa',
                'id_kelas' => 3,
                'nis' => '8994'
            ],
            [
                'name' => 'Kamitachi Shizawa',
                'username' => 'shizawaaa',
                'email' => 'shizawaaa1@gmail.com',
                'password' => Hash::make('1234'),
                'role' => 'siswa',
                'id_kelas' => 2,
                'nis' => '8994'
            ],
        ];
        
        foreach ($data as $user) {
            User::create($user);
        }
    }
}
