<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opd extends Model
{
    use HasFactory;

    protected $table = 'opds';

    protected $fillable = [
        'nama_opd',
        'kabupaten_kota',
        'kategori_sektor',
        'alamat',
        'no_telepon',
        'status'
    ];

    protected $casts = [
        'status' => 'string'
    ];
}
