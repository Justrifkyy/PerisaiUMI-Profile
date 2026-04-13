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
        Schema::dropIfExists('news');

        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul berita
            $table->string('slug')->unique(); // URL friendly
            $table->string('category')->nullable(); // Contoh: Prestasi, Kegiatan, Informasi
            $table->longText('content')->nullable(); // Isi berita lengkap (format HTML/WYSIWYG)
            $table->timestamp('published_at')->nullable(); // Tanggal publikasi berita
            $table->string('cover_image')->nullable(); // Foto utama bentuk kotak 1:1
            $table->json('gallery_images')->nullable(); // Dokumentasi tambahan
            $table->boolean('is_published')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
