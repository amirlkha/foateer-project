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
        Schema::create('foateer_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_foateer');
            $table->string('foateer_number', 50);
            $table->foreign('id_foateer')->references('id')->on('foateers')->onDelete('cascade');
            $table->string('product', 50);
            $table->string('section', 999);
            $table->string('Status', 50);
            $table->integer('Value_Status');
            $table->date('Payment_Date')->nullable();
            $table->text('note')->nullable();
            $table->string('user',300);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foateer_details');
    }
};
