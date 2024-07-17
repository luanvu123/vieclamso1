<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCvNameToCvsTable extends Migration
{
    public function up()
    {
        Schema::table('cvs', function (Blueprint $table) {
            $table->string('cv_name')->nullable();
        });
    }

    public function down()
    {
        Schema::table('cvs', function (Blueprint $table) {
            $table->dropColumn('cv_name');
        });
    }
}

