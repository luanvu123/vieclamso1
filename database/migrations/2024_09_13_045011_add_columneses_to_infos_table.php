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
            $table->string('about_image_mobile')->nullable();
            $table->string('upload_cv_title')->nullable();
            $table->string('upload_cv_subtitle')->nullable();
            $table->text('upload_cv_desc')->nullable();
            $table->string('profile_banner_image')->nullable();
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

                'about_image_mobile',
                'upload_cv_title',
                'upload_cv_subtitle',
                'upload_cv_desc',
                'profile_banner_image',
            ]);
        });
    }
};
