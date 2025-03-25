<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Absen;
use App\Models\User;

class AbsenSeeder extends Seeder
{
    public function run()
    {
        Absen::create([
            'user_id' => User::first()->id, 
            'kelas_id' => 1, 
            'tanggal' => now(),
            'status' => 'Hadir'
        ]);
    }
}
