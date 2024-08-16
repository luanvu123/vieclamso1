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
        Schema::table('applications', function (Blueprint $table) {
            $table->unsignedTinyInteger('rating')->nullable(); // Cột rating (giá trị từ 1 đến 5)
            $table->text('note')->nullable(); // Cột note
            $table->boolean('hidden')->default(false); // Cột hidden (true: ẩn, false: hiển thị, mặc định là hiển thị)
        });
    }

    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn('rating');
            $table->dropColumn('note');
            $table->dropColumn('hidden');
        });
    }
};
