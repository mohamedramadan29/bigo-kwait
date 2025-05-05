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
        Schema::create('support_message_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticket_message_id');
            $table->string('file');
            $table->timestamps();
            $table->foreign('ticket_message_id')->references('id')->on('ticket_messages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_message_files');
    }
};
