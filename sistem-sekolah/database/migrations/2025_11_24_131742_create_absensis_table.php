<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();

            // Sesuai dengan tabel siswa (bukan siswas)
            $table->unsignedBigInteger('siswa_id');
            $table->foreign('siswa_id')
                ->references('id')
                ->on('siswa')
                ->onDelete('cascade'); 

            // Status kehadiran
            $table->enum('status', ['hadir', 'izin', 'alpha'])->default('hadir');

            // Foto bukti dari kamera / FastAPI
            $table->string('foto_bukti')->nullable();

            // Metode: wajah/manual
            $table->enum('metode', ['wajah', 'manual'])->default('wajah');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
