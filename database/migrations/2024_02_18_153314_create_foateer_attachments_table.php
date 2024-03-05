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
        Schema::create('foateer_attachments', function (Blueprint $table) {
            $table->id();
            $table->string('file_name', 999);
            $table->string('foateer_number', 50);
            $table->string('Created_by', 999);
            $table->unsignedBigInteger('foateer_id')->nullable();
            $table->foreign('foateer_id')->references('id')->on('foateers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foateer_attachments');
    }
};
