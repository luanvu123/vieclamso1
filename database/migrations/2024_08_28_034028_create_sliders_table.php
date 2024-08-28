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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing primary key column named 'id'
            $table->enum('status', ['active', 'inactive'])->default('inactive'); // Creates an 'enum' column for status
            $table->string('link'); // Creates a 'link' column for the slider link
            $table->string('image'); // Creates an 'image' column for storing image paths
            $table->unsignedBigInteger('user_id'); // Creates a 'user_id' column for foreign key
            $table->timestamps(); // Creates 'created_at' and 'updated_at' timestamp columns

            // Add foreign key constraint (assuming you have a 'users' table with an 'id' column)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
};
