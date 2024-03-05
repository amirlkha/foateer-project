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
        Schema::create('mains', function (Blueprint $table) {
           $table->increments('id');
           $table->string('invoice_number');
           $table->date('invoice_date');
           $table->string('section');
           $table->string('product');
           $table->string('discount');
           $table->string('rate_vat');
           $table->decimal('value_vat',8,2);
           $table->decimal('status',58);
           $table->integer('value_status');
           $table->text('note')->nullable();
           $table->string('user');
           $table->softDeletes();
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mains');
    }
};
