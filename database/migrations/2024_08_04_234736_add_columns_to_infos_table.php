<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToInfosTable extends Migration
{
    public function up()
    {
        Schema::table('infos', function (Blueprint $table) {
            $table->string('link_website')->nullable();
            $table->string('name_website')->nullable();
            $table->string('copyright')->nullable();
            $table->string('supporter')->nullable();
            $table->string('name_supporter')->nullable();
            $table->string('title_supporter')->nullable();
            $table->string('logo')->nullable();
            $table->string('logo_google_for_startup')->nullable();
            $table->string('logo_dmca_com')->nullable();
        });
    }

    public function down()
    {
        Schema::table('infos', function (Blueprint $table) {
            $table->dropColumn([
                'link_website',
                'name_website',
                'copyright',
                'supporter',
                'name_supporter',
                'title_supporter',
                'logo',
                'logo_google_for_startup',
                'logo_dmca_com'
            ]);
        });
    }
}
