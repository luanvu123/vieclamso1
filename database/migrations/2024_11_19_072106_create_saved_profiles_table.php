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
        Schema::create('saved_profiles', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('employer_id');
    $table->unsignedBigInteger('candidate_id');
    $table->timestamps();

    // Foreign keys
    $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
    $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saved_profiles');
    }
};
