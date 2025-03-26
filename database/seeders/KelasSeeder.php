<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nama_kelas' => 'XIRA', "id_kopetensi" => 1],
            ['nama_kelas' => 'XIRB', "id_kopetensi" => 1],
            ['nama_kelas' => 'XIRC', "id_kopetensi" => 1],
            ['nama_kelas' => 'XIOA', "id_kopetensi" => 2],
        ];
        
        DB::table('kelas')->insert($data);
    }
}

