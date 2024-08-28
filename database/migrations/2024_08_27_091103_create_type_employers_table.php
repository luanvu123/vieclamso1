<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeEmployersTable extends Migration
{
    public function up()
    {
        Schema::create('type_employers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('top_point')->default(0);
            $table->string('image')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });

        Schema::table('employers', function (Blueprint $table) {
            $table->foreignId('type_employer_id')->nullable()->constrained('type_employers');
        });
    }

    public function down()
    {
        Schema::table('employers', function (Blueprint $table) {
            $table->dropForeign(['type_employer_id']);
            $table->dropColumn('type_employer_id');
        });

        Schema::dropIfExists('type_employers');
    }
}
