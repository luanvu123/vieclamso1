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
        Schema::create('type_cart', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });

        // Thêm khóa ngoại liên kết với bảng carts
        Schema::table('carts', function (Blueprint $table) {
            $table->unsignedBigInteger('type_cart_id')->nullable();

            $table->foreign('type_cart_id')->references('id')->on('type_cart')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropForeign(['type_cart_id']);
            $table->dropColumn('type_cart_id');
        });

        Schema::dropIfExists('type_cart');
    }
};
