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
        Schema::create('plan_features', function (Blueprint $table) {
            $table->id();
            $table->string('feature');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('plan_features');
    }
};