<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pertandingan extends Model
{
    protected $table = 'pertandingan';

    protected $fillable = [
        'nama_pertandingan',
        'kategori',
        'tgl_pertandingan',
        'dokumentasi',
        'deskripsi_kegiatan'
    ];

    protected $casts = [
        'dokumentasi' => 'array',
        'tgl_pertandingan' => 'date',
    ];
}
