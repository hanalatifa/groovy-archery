<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documentation extends Model
{
    protected $fillable = ['judul', 'deskripsi', 'foto'];

    protected $casts = [
        'foto' => 'array',
    ];
}