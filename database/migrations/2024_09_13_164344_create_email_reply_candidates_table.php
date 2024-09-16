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
    Schema::create('email_reply_candidates', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('candidate_id');
        $table->unsignedBigInteger('user_id');
        $table->string('to');
        $table->string('subject');
        $table->text('message');
        $table->string('attachment')->nullable();
        $table->timestamps();

        $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_reply_candidates');
    }
};
