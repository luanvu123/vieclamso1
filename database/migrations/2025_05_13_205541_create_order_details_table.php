<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('cart_id')->nullable(); // nếu bạn dùng liên kết đến cart
            $table->integer('quantity')->default(1);
            $table->integer('number_of_weeks')->default(1);
            $table->decimal('price', 12, 2)->default(0);
            $table->decimal('total_price', 12, 2)->default(0);
            $table->date('expiring_date')->nullable();
            $table->integer('number_of_active')->default(0);
            $table->timestamps();

            $table->foreign('order_id')
                ->references('id')->on('orders')
                ->onDelete('cascade');

            $table->foreign('service_id')
                ->references('id')->on('services')
                ->onDelete('cascade');

            $table->foreign('cart_id')
                ->references('id')->on('carts')
                ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
