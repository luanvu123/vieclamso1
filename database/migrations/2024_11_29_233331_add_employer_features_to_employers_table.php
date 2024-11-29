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
            $table->boolean('IsBasicnews')->default(false)->after('isInfomation');
            $table->boolean('isUrgentrecruitment')->default(false)->after('IsBasicnews');
            $table->boolean('IsPrioritize')->default(false)->after('isUrgentrecruitment');
            $table->boolean('IsRefresheveryhour')->default(false)->after('IsPrioritize');
            $table->boolean('IsRefresheveryday')->default(false)->after('IsRefresheveryhour');
            $table->boolean('IsDarkredeffect')->default(false)->after('IsRefresheveryday');
            $table->boolean('IsFramingeffect')->default(false)->after('IsDarkredeffect');
            $table->boolean('IsHoteffect')->default(false)->after('IsFramingeffect');
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
