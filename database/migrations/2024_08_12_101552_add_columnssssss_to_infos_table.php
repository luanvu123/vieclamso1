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
            $table->string('recruitment_title_1')->nullable();
            $table->string('recruitment_image_1')->nullable();
            $table->string('big_update_title')->nullable();
            $table->string('big_update_title_1')->nullable();
            $table->text('big_update_description')->nullable();
            $table->string('big_update_image')->nullable();
            $table->string('ai_in_recruitment')->nullable();
            $table->string('ai_in_recruitment_h1')->nullable();
            $table->string('ai_in_recruitment_h2')->nullable();
            $table->string('ai_in_recruitment_image')->nullable();
            $table->string('core_functions')->nullable();
            $table->string('smart_recruitment')->nullable();
            $table->text('smart_recruitment_description')->nullable();
            $table->string('about_us')->nullable();
            $table->string('about_us_h1')->nullable();
            $table->string('about_us_image')->nullable();
            $table->string('bct_url')->nullable();
            $table->string('bct_image')->nullable();
        });
    }

    public function down()
    {
        Schema::table('infos', function (Blueprint $table) {
            $table->dropColumn([
                'recruitment_title_1', 'recruitment_image_1', 'big_update_title', 'big_update_title_1',
                'big_update_description', 'big_update_image', 'ai_in_recruitment', 'ai_in_recruitment_h1',
                'ai_in_recruitment_h2', 'ai_in_recruitment_image', 'core_functions', 'smart_recruitment',
                'smart_recruitment_description', 'about_us', 'about_us_h1', 'about_us_image',
                'bct_url', 'bct_image'
            ]);
        });
    }
};
