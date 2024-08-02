<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeFeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name' => 'Công cụ tạo CV'],
            ['name' => 'Công cụ tìm kiếm'],
            ['name' => 'Tính năng/Giao diện trang web'],
            ['name' => 'Thông báo việc làm'],
            ['name' => 'Thông tin công ty'],
            ['name' => 'Khác'],
        ];

        DB::table('type_feedback')->insert($types);
    }
}

