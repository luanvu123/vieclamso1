<?php

// database/migrations/xxxx_xx_xx_create_job_postings_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPostingsTable extends Migration
{
    public function up()
    {
        Schema::create('job_postings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_id');
            $table->string('email');
            $table->string('title');
            $table->string('type');
            $table->string('category')->nullable();
            $table->string('location')->nullable();
            $table->string('tags')->nullable();
            $table->text('description');
            $table->string('application_email_url');
            $table->date('closing_date')->nullable();
            $table->string('company_name');
            $table->string('website')->nullable();
            $table->string('tagline')->nullable();
            $table->string('video')->nullable();
            $table->string('twitter')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();

            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_postings');
    }
}

