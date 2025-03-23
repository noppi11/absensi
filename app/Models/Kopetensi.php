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
     * Get all of the classs for the Kopetensi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function classs(): HasMany
    {
        return $this->hasMany(Kelas::class, 'id_kopetensi');
    }
}
