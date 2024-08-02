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
    Schema::create('support', function (Blueprint $table) {
        $table->id();
        $table->string('phone')->nullable();
        $table->string('email')->nullable();
        $table->foreignId('type_support_id')->constrained('type_support')->onDelete('cascade');
        $table->text('description');
        $table->enum('status', ['pending', 'resolved', 'closed'])->default('pending');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('support');
}

};
