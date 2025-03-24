<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('kopetensis')->insert([
            [
                'name' => 'Rekayasa Perangkat Lunak',
                'slug' => "rekayasa-perangkat-lunak"
            ],
            [
                'name' => 'Teknik Ototronik',
                'slug' => "teknik-ototronik"
            ],
            [
                'Teknik-Tekstil',
                "slug" => "teknik-tekstil"
            ]
        ]);
        $this->call(KelasSeeder::class);
        $this->call(UserSeeder::class);
        \App\Models\Kelas::query()->update(['id_wali_kelas' => 2]);
    }
}
