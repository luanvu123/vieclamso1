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
        Schema::create('cart_plan_feature', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('plan_feature_id');
            $table->timestamps();

            // Thiết lập khóa ngoại
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
            $table->foreign('plan_feature_id')->references('id')->on('plan_features')->onDelete('cascade');

            // Đảm bảo không có trùng lặp
            $table->unique(['cart_id', 'plan_feature_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_plan_feature');
    }
};
