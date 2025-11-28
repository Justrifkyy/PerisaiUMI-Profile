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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // e.g., "PERISAI HUMANITY"
            $table->text('description'); // Card description
            $table->string('image')->nullable(); // Image path
            $table->string('gradient')->default('from-yellow-500 to-yellow-700'); // Tailwind gradient classes
            $table->string('category')->nullable(); // e.g., "humanity", "achievement", "event"
            $table->boolean('is_published')->default(true);
            $table->timestamp('published_at')->nullable();
            $table->integer('order')->default(0); // Display order
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
