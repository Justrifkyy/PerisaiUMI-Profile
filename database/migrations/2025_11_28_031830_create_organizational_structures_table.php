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
        Schema::create('organizational_structures', function (Blueprint $table) {
            $table->id();
            $table->string('position'); // e.g., "Ketua Umum", "Wakil Ketua"
            $table->string('name'); // Person's name
            $table->string('photo')->nullable(); // Photo path
            $table->foreignId('department_id')->nullable()->constrained()->onDelete('set null');
            $table->integer('level')->default(0); // Hierarchy level (0 = top)
            $table->integer('order')->default(0);
            $table->string('period'); // e.g., "2025/2026"
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizational_structures');
    }
};
