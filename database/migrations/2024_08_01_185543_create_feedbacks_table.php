<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbacksTable extends Migration
{
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->text('content');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->tinyInteger('satisfaction')->nullable(); // 1: Rất tệ, 2: Tệ, 3: Bình thường, 4: Tốt, 5: Tuyệt vời
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('feedbacks');
    }
}
