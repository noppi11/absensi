<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'nama_kelas',
        'id_wali_kelas'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_wali_kelas', 'id');
    }
}
