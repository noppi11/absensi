<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kopetensi extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Relasi ke model Kelas
     */
    public function kelas(): HasMany
    {
        return $this->hasMany(Kelas::class, 'id_kopetensi');
    }
}
