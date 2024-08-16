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
    Schema::create('city_job_posting', function (Blueprint $table) {
        $table->id();
        $table->foreignId('city_id')->constrained()->onDelete('cascade');
        $table->foreignId('job_posting_id')->constrained()->onDelete('cascade');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('city_job_posting');
}

};
