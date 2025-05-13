<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_id');
            $table->unsignedBigInteger('service_id');
            $table->integer('quantity')->default(1);
            $table->integer('number_of_weeks')->default(1);
            $table->decimal('total_price', 12, 2)->default(0);
            $table->timestamps();

            // Foreign keys
            $table->foreign('employer_id')
                  ->references('id')->on('employers')
                  ->onDelete('cascade');

            $table->foreign('service_id')
                  ->references('id')->on('services')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
