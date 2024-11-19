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
    Schema::table('candidates', function (Blueprint $table) {
        $table->string('level')->nullable(); // Level hiện tại
        $table->string('desired_level')->nullable(); // Level mong muốn
        $table->string('desired_salary')->nullable(); // Lương mong muốn
        $table->string('education_level')->nullable(); // Trình độ học vấn
        $table->integer('years_of_experience')->nullable(); // Số năm kinh nghiệm
        $table->string('working_form')->nullable(); // Hình thức làm việc
        $table->string('work_location')->nullable(); // Địa điểm làm việc
    });
}

public function down()
{
    Schema::table('candidates', function (Blueprint $table) {
        $table->dropColumn([
            'level',
            'desired_level',
            'desired_salary',
            'education_level',
            'years_of_experience',
            'working_form',
            'work_location',
        ]);
    });
}

};
