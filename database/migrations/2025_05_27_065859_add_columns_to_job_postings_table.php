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
    Schema::table('job_postings', function (Blueprint $table) {
        $table->longText('job_skills')->nullable();
        $table->longText('benefits')->nullable();
        $table->string('education')->nullable();
    });
}

public function down()
{
    Schema::table('job_postings', function (Blueprint $table) {
        $table->dropColumn(['job_skills', 'benefits', 'education']);
    });
}


    /**
     * Reverse the migrations.
     */
    
};
