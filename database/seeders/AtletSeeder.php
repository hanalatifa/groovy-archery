<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AtletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void {
    \App\Models\Atlet::create([
        'nama'          => 'Hana Latifa',
        'kategori'      => 'Senior',
        'tgl_bergabung' => '2024-01-01',
        'foto'          => null,
        'deskripsi'     => 'Atlet panahan berbakat dari klub Groovy.'
    ]);
    }
}
