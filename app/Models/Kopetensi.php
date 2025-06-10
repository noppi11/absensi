<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kopetensi extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function classs(): HasMany
    {
        return $this->hasMany(Kelas::class, 'id_kopetensi');
    }
    // Model Kopetensi.php
    public function students()
    {
        return $this->hasManyThrough(User::class, Kelas::class,   // model kelas
            'id_kopetensi', // foreign key di tabel kelas yang menghubungkan ke kopetensi
            'id_kelas',     // foreign key di tabel users yang menghubungkan ke kelas
            'id',           // primary key kopetensi
            'id'            // primary key kelas
        );
    }
    public function users()
    {
        return $this->hasMany(User::class, 'id_kopetensi'); // pakai nama kolom yang benar
    }
    public function kelas()
{
    return $this->hasMany(Kelas::class, 'id_kopetensi');
}



}

