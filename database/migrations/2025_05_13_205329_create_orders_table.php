<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_id');
            $table->string('order_key')->unique();
            $table->enum('status', ['pending', 'completed', 'canceled'])->default('pending');
            $table->decimal('total_price', 12, 2)->default(0);
            $table->timestamps();

            $table->foreign('employer_id')
                ->references('id')->on('employers')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
