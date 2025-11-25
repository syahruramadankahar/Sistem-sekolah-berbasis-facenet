<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('galeri', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 100);
            $table->string('gambar', 255);
            $table->date('tanggal')->nullable();
            $table->unsignedBigInteger('uploader_id');
            $table->timestamps();

            // Foreign key
            $table->foreign('uploader_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galeri');
    }
};
