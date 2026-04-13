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
        Schema::create('web_settings', function (Blueprint $table) {
            $table->id();
            $table->string('video_url')->nullable(); // Link YouTube untuk halaman Home
            $table->string('email')->nullable(); // Email kontak
            $table->string('phone')->nullable(); // No. WhatsApp
            $table->text('address')->nullable(); // Alamat kesekretariatan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_settings');
    }
};
