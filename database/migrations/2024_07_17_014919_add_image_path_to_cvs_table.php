<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImagePathToCvsTable extends Migration
{
    public function up()
    {
        Schema::table('cvs', function (Blueprint $table) {
            $table->string('image_path')->nullable();
        });
    }

    public function down()
    {
        Schema::table('cvs', function (Blueprint $table) {
            $table->dropColumn('image_path');
        });
    }
}
