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
        Schema::dropIfExists('statistics'); // Hapus tabel lama jika ada

        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->string('label'); // Contoh: Anggota Aktif, Program Kerja
            $table->string('value'); // Contoh: 50+, 150+
            $table->string('description')->nullable(); // Teks kecil di bawah angka
            $table->integer('order')->default(0); // Urutan tampilan
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistics');
    }
};
