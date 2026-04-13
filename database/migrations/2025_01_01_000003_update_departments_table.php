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
        Schema::dropIfExists('departments');

        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Contoh: RISTEK, KOMPRES
            $table->string('slug')->unique(); // URL friendly (ristek, kompres)
            $table->longText('description')->nullable(); // Penjelasan departemen
            $table->longText('vision')->nullable(); // Teks visi
            $table->longText('mission')->nullable(); // Teks misi (bisa format HTML/List)
            $table->string('group_photo')->nullable(); // Path gambar foto landscape
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
        Schema::dropIfExists('departments');
    }
};
