<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvTemplateTable extends Migration
{
    public function up()
    {
        Schema::create('cv_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url');
            $table->string('image');
            $table->json('colors'); // Sử dụng cột JSON để lưu trữ nhiều màu
            $table->boolean('status')->default(true); // Trạng thái mặc định là true
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cv_template');
    }
}
