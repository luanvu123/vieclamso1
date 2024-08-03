<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/xxxx_xx_xx_create_job_reports_table.php
public function up()
{
    Schema::create('job_reports', function (Blueprint $table) {
        $table->id();
        $table->foreignId('job_posting_id')->constrained('job_postings')->onDelete('cascade');
        $table->foreignId('candidate_id')->constrained('candidates')->onDelete('cascade');
        $table->string('name');
        $table->text('content');
        $table->string('status')->default('pending');
        $table->timestamps();
    });
}

};
