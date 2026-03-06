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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(); // Dibuat nullable jika admin hanya ingin upload foto tanpa judul
            $table->text('description')->nullable();
            $table->string('image_path'); // Path penyimpanan file gambar
            $table->string('category')->nullable(); // cth: "events", "achievements", "activities"
            $table->integer('order')->default(0); // Untuk urutan tampilan
            $table->boolean('is_active')->default(true); // Memperbaiki bug sebelumnya
            $table->boolean('is_featured')->default(false); // Untuk highlight foto di beranda
            $table->timestamp('taken_at')->nullable(); // Waktu foto diambil
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};