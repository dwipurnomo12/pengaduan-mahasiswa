<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->string('judul_pengaduan');
            $table->string('slug')->unique();
            $table->longText('body');
            $table->enum('status', ['Sedang Diproses', 'Selesai', 'Tidak Dapat Diproses'])->default('Sedang Diproses');
            $table->string('excerpt');
            $table->foreignId('user_id');
            $table->foreignId('kategori_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};
