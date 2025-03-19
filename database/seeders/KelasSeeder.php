<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nama_kelas' => 'XIRA'],
            ['nama_kelas' => 'XIRB'],
            ['nama_kelas' => 'XIRC'],
        ];
        
        DB::table('kelas')->insert($data);
    }
}

