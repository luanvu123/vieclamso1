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
    Schema::table('infos', function (Blueprint $table) {
        $table->decimal('vat', 5, 2)->default(0)->after('company_name'); // Adjust the position and default value as needed
    });
}

public function down()
{
    Schema::table('infos', function (Blueprint $table) {
        $table->dropColumn('vat');
    });
}

};
