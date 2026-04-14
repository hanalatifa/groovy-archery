<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atlet extends Model
{
    protected $fillable = [
    'nama', 
    'kategori', 
    'tgl_bergabung', 
    'foto', 
    'deskripsi'
    ];
}
