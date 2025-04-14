<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->references('id')->on('stores')->cascadeOnDelete();
            $table->integer('user_id')->nullable();
            $table->string('session_id')->nullable();
            $table->string('name');
            $table->string('phone');
            $table->integer('table_number');
            $table->text('notes')->nullable();
            $table->string('time_delivery')->nullable();
            $table->string('payment_method');
            $table->float('shipping_price')->nullable();
            $table->string('coupon_code')->nullable();
            $table->float('coupon_amount')->nullable();
            $table->string('order_status')->default('لم يبدأ');
            $table->decimal('grand_total', '8', '2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
