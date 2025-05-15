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
    Schema::table('cvs', function (Blueprint $table) {
        // Xóa foreign key trước (phải dùng đúng tên constraint)
        $table->dropForeign(['candidate_id']);

        // Sau đó mới xóa cột
        $table->dropColumn('candidate_id');
    });
}

public function down()
{
    Schema::table('cvs', function (Blueprint $table) {
        $table->unsignedBigInteger('candidate_id')->nullable();

        $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
    });
}

};
