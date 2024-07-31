<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('skill')->nullable();
            $table->string('position')->nullable();
            $table->boolean('is_public')->default(0);
            $table->boolean('cv_public')->default(0);
            $table->string('linkedin')->nullable();
            $table->text('story')->nullable();
            $table->string('letter_path')->nullable();
            $table->string('cover_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->dropColumn([
                'gender',
                'address',
                'skill',
                'position',
                'is_public',
                'cv_public',
                'linkedin',
                'story',
                'letter_path',
                'cover_image'
            ]);
        });
    }
}
