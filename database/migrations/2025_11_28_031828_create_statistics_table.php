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
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->string('label'); // e.g., "Alumni UKM Perisai UMI"
            $table->string('period')->nullable(); // e.g., "2014-2024"
            $table->integer('number'); // e.g., 100
            $table->string('bg_class')->default('bg-zinc-800'); // Tailwind classes
            $table->string('text_class')->default('text-gray-400');
            $table->integer('order')->default(0); // Display order
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
