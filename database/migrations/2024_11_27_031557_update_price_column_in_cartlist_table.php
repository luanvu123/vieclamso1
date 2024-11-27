

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePriceColumnInCartlistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cartlist', function (Blueprint $table) {
            // Thay đổi kiểu dữ liệu của cột price
            $table->decimal('price', 12, 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cartlist', function (Blueprint $table) {
            // Khôi phục kiểu dữ liệu ban đầu, ví dụ: FLOAT
            $table->float('price')->change();
        });
    }
}
