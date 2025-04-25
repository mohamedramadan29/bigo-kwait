<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Public Setting For Website
     */
    public function up(): void
    {
        Schema::create('main_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->string('logo');
            $table->string('favicon');
            $table->string('address')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('snapchat')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('main_color')->default('#000000');
            $table->string('secondary_color')->default('#fff');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_settings');
    }
};
