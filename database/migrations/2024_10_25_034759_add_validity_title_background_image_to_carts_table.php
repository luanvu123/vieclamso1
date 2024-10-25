<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddValidityTitleBackgroundImageToCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->integer('validity')->nullable(); // Thêm cột validity (có thể là số ngày)
            $table->string('title')->nullable(); // Thêm cột title
            $table->string('background_image')->nullable(); // Thêm cột background_image
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropColumn('validity');
            $table->dropColumn('title');
            $table->dropColumn('background_image');
        });
    }
}
