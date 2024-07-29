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
       Schema::create('messages', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('candidate_id');
    $table->unsignedBigInteger('employer_id');
    $table->text('message');
    $table->timestamps();

    $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
    $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
