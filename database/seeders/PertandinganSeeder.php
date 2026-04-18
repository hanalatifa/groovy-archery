<?php

namespace Database\Seeders;

use App\Models\Pertandingan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PertandinganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pertandingan::create([
            'nama_pertandingan' => 'Kejurnas Jambi 2026',
            'kategori' => 'Nasional',
            'tgl_pertandingan' => '2026-04-18',
            // Karena ini data dummy, kita isi array nama file saja
            'dokumentasi' => ['foto_dummy_1.jpg', 'foto_dummy_2.jpg'],
            'deskripsi_kegiatan' => 'Tes input data pertandingan via Seeder.'
        ]);
    }
}
