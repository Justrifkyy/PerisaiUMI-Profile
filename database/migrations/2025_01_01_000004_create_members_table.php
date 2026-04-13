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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->nullable()->constrained('departments')->onDelete('set null');
            $table->string('name');
            $table->string('position'); // Contoh: Ketua Umum, Kadep Ristek, Staf Ahli Media
            $table->enum('hierarchy', ['pembina', 'inti', 'kadep', 'staf']); // Kategori hierarki
            $table->string('linkedin_url')->nullable(); // Link profil LinkedIn
            $table->string('photo')->nullable(); // Path gambar foto profil 3:4
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
        Schema::dropIfExists('members');
    }
};
