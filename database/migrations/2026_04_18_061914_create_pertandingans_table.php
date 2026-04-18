<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('pertandingan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pertandingan');
            $table->enum('kategori', ['Nasional', 'Internasional']);
            $table->date('tgl_pertandingan');
            $table->json('dokumentasi');
            $table->text('deskripsi_kegiatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertandingans');
    }
};
