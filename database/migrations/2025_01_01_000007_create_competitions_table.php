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
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul lomba
            $table->string('slug')->unique(); // URL friendly
            $table->enum('category', ['internasional', 'nasional', 'dikti', 'kti_essay', 'poster', 'debat', 'business_plan', 'video_editing']);
            $table->date('deadline'); // Batas pendaftaran
            $table->longText('description')->nullable(); // Penjelasan syarat, ketentuan, hadiah, dll
            $table->string('registration_link')->nullable(); // Link Google Form/Website eksternal
            $table->json('poster_images')->nullable(); // Array foto poster 1:1 (Slide 1 untuk cover, Slide 2 dst untuk carousel)
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
        Schema::dropIfExists('competitions');
    }
};
