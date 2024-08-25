<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
    {
        Schema::create('cartlist', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_id');
            $table->unsignedBigInteger('cart_id');
            $table->integer('quantity');
            $table->decimal('price', 8, 2);
            $table->enum('status', ['pending', 'completed', 'cancelled']);
            $table->timestamps();

            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cartlist');
    }
};
