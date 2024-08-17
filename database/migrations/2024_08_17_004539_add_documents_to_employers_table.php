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
            $table->string('business_license')->nullable();
            $table->string('commission')->nullable();
            $table->string('identification_card')->nullable();
        });
    }

    public function down()
    {
        Schema::table('employers', function (Blueprint $table) {
            $table->dropColumn(['business_license', 'commission', 'identification_card']);
        });
    }
};
