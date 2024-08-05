<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsssToInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('infos', function (Blueprint $table) {
            $table->string('image_section')->nullable();
            $table->string('title_section')->nullable();
            $table->string('title2_section')->nullable();
            $table->string('title3_section')->nullable();
            $table->string('image_qr_code_download')->nullable();
            $table->string('link_appstore')->nullable();
            $table->string('image_appstore')->nullable();
            $table->string('link_googleplay')->nullable();
            $table->string('image_googleplay')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('infos', function (Blueprint $table) {
            $table->dropColumn([
                'image_section',
                'title_section',
                'title2_section',
                'title3_section',
                'image_qr_code_download',
                'link_appstore',
                'image_appstore',
                'link_googleplay',
                'image_googleplay'
            ]);
        });
    }
}

