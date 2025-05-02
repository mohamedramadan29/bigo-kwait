<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ecommerce_plan_subscribes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('ecommerce_plan_id')->constrained('ecommerce_plans')->cascadeOnDelete();
            $table->string('payment_id')->nullable();
            $table->double('price', 8, 2)->default(0);
            $table->string('duration');
            $table->string('start_date');
            $table->string('end_date');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecommerce_plan_subscribes');
    }
};
