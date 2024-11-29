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
        Schema::table('employers', function (Blueprint $table) {
            $table->enum('IsBasicnews', [0, 1])->default(0);
            $table->enum('isUrgentrecruitment', [0, 1])->default(0);
            $table->enum('IsPrioritize', [0, 1])->default(0);
            $table->enum('IsRefresheveryhour', [0, 1])->default(0);
            $table->enum('IsRefresheveryday', [0, 1])->default(0);
            $table->enum('IsDarkredeffect', [0, 1])->default(0);
            $table->enum('IsFramingeffect', [0, 1])->default(0);
            $table->enum('IsHoteffect', [0, 1])->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('employers', function (Blueprint $table) {
            $table->dropColumn([
                'IsBasicnews',
                'isUrgentrecruitment',
                'IsPrioritize',
                'IsRefresheveryhour',
                'IsRefresheveryday',
                'IsDarkredeffect',
                'IsFramingeffect',
                'IsHoteffect',
            ]);
        });
    }
};
