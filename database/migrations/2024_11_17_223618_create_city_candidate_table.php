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
        Schema::create('city_candidate', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->constrained()->onDelete('cascade');
            $table->foreignId('candidate_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            // Ensure no duplicates in the pivot table
            $table->unique(['city_id', 'candidate_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('city_candidate');
    }
};
