<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $table = 'tugas';

    protected $fillable = [
        'nama_tugas',
        'mata_kuliah',
        'tenggat_waktu',
        'status',
    ];
}
