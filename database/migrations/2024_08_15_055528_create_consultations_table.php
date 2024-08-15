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
        Schema::create('consultations', function (Blueprint $table) {
        $table->id();
        $table->string('fullname');
        $table->string('email');
        $table->string('phone');
        $table->foreignId('city_id')->constrained('cities')->onDelete('cascade');
        $table->foreignId('type_consulting_id')->constrained('type_consultings')->onDelete('cascade');
        $table->text('consulting_text')->nullable();
        $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
