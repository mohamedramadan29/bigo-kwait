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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->references('id')->on('stores')->cascadeOnDelete();
            $table->string('file_name');
            $table->string('product_slug')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('link')->nullable();
            $table->string('link_text')->nullable();
            $table->string('status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
