<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nama_kelas' => 'XIRA', "kompetensi_keahlian" => "Test", "id_kopetensi" => 1],
            ['nama_kelas' => 'XIRB', "kompetensi_keahlian" => "Test", "id_kopetensi" => 1],
            ['nama_kelas' => 'XIRC', "kompetensi_keahlian" => "Test", "id_kopetensi" => 1],
            ['nama_kelas' => 'XIOA', "kompetensi_keahlian" => "Test", "id_kopetensi" => 2],
        ];
        
        DB::table('kelas')->insert($data);
    }
}

