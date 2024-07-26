<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToEcosystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ecosystems', function (Blueprint $table) {
            $table->string('name_link_website')->nullable()->after('website');
            $table->string('image_footer')->nullable()->after('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ecosystems', function (Blueprint $table) {
            $table->dropColumn('name_link_website');
            $table->dropColumn('image_footer');
        });
    }
}
