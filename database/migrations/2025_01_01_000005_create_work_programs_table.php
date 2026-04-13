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
        Schema::create('work_programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained('departments')->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique(); // URL friendly
            $table->string('short_description')->nullable(); // Muncul di belakang Flip Card (maks ~250 karakter)
            $table->longText('content')->nullable(); // Penjelasan lengkap (format HTML/WYSIWYG)
            $table->string('cover_image')->nullable(); // Foto utama bentuk kotak 1:1
            $table->json('gallery_images')->nullable(); // Array berisi path gambar-gambar dokumentasi
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_programs');
    }
};
