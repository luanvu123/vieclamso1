<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToJobPostingsTable extends Migration
{
    public function up()
    {
        Schema::table('job_postings', function (Blueprint $table) {
            $table->string('salary')->nullable();
            $table->string('place')->nullable();
            $table->string('experience')->nullable();
            $table->string('rank')->nullable();
            $table->integer('number_of_recruits')->nullable();
            $table->string('sex')->nullable();
            $table->string('status')->default(1);
            $table->string('skills_required')->nullable();
            $table->string('area')->nullable();
        });
    }

    public function down()
    {
        Schema::table('job_postings', function (Blueprint $table) {
            $table->dropColumn([
                'salary',
                'place',
                'experience',
                'rank',
                'number_of_recruits',
                'sex',
                'status',
                'skills_required',
                'area'
            ]);
        });
    }
}
