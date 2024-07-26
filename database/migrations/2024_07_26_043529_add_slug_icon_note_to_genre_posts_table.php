<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugIconNoteToGenrePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('genre_posts', function (Blueprint $table) {
            $table->string('slug')->unique()->nullable()->after('title');
            $table->string('icon')->nullable()->after('slug');
            $table->text('note')->nullable()->after('icon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('genre_posts', function (Blueprint $table) {
            $table->dropColumn(['slug', 'icon', 'note']);
        });
    }
}

