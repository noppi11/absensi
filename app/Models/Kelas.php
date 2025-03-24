<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'nama_kelas',
        'kompetensi_keahlian',
        'id_wali_kelas',
        'id_kopetensi'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_wali_kelas', 'id');
    }
    public function students()
    {
        return $this->hasMany(User::class, 'id_kelas');
    }
    /**
     * Get the kopetensi that owns the Kelas
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kopetensi(): BelongsTo
    {
        return $this->belongsTo(Kopetensi::class, 'id_kopetensi');
    }
}
