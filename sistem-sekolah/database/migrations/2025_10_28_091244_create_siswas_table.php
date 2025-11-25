<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // 🔹 tidak unique dan boleh null
            $table->string('nis', 20)->unique();
            $table->string('nama', 100);
            $table->unsignedBigInteger('kelas_id');
            $table->string('jurusan', 50);
            $table->text('alamat')->nullable();
            $table->timestamps();

            // 🔹 Foreign keys
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('set null'); // agar kalau user dihapus, siswa tetap ada

            $table->foreign('kelas_id')
                  ->references('id')
                  ->on('kelas')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
