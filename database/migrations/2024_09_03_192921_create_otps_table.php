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
        Schema::create('otps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_id');
            $table->string('otp_code');
            $table->timestamp('expires_at');
            $table->timestamps();

            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('otps');
    }
};
