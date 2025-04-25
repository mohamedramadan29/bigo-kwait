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
        Schema::create('governrates', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->double('price', 10, 2)->default(0);
            $table->boolean('is_active')->default(true);
            $table->foreignId('country_id')->references('id')->on('countries')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('governrates');
    }
};
