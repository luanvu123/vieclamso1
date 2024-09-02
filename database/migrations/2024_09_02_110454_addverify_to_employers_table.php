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
            $table->string('identification_card_behind')->nullable()->after('identification_card');
            $table->boolean('isVerify_license')->default(false)->after('isVerify');
            $table->boolean('isVerifyCompany')->default(false)->after('isVerify_license');
            $table->integer('level')->default(0)->after('isVerifyCompany');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employers', function (Blueprint $table) {
            $table->dropColumn('identification_card_behind');
            $table->dropColumn('isVerify_license');
            $table->dropColumn('isVerifyCompany');
            $table->dropColumn('level');
        });
    }
};
