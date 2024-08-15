<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    public function run()
    {
        $cities = [
            ['id' => 1, 'name' => 'Hà Nội', 'status' => true],
            ['id' => 2, 'name' => 'Hồ Chí Minh', 'status' => true],
            ['id' => 3, 'name' => 'Bình Dương', 'status' => true],
            ['id' => 4, 'name' => 'Bắc Ninh', 'status' => true],
            ['id' => 5, 'name' => 'Đồng Nai', 'status' => true],
            ['id' => 6, 'name' => 'Hưng Yên', 'status' => true],
            ['id' => 7, 'name' => 'Hải Dương', 'status' => true],
            ['id' => 8, 'name' => 'Đà Nẵng', 'status' => true],
            ['id' => 9, 'name' => 'Hải Phòng', 'status' => true],
            ['id' => 10, 'name' => 'An Giang', 'status' => true],
            ['id' => 11, 'name' => 'Bà Rịa-Vũng Tàu', 'status' => true],
            ['id' => 12, 'name' => 'Bắc Giang', 'status' => true],
            ['id' => 13, 'name' => 'Bắc Kạn', 'status' => true],
            ['id' => 14, 'name' => 'Bạc Liêu', 'status' => true],
            ['id' => 15, 'name' => 'Bến Tre', 'status' => true],
            ['id' => 16, 'name' => 'Bình Định', 'status' => true],
            ['id' => 17, 'name' => 'Bình Phước', 'status' => true],
            ['id' => 18, 'name' => 'Bình Thuận', 'status' => true],
            ['id' => 19, 'name' => 'Cà Mau', 'status' => true],
            ['id' => 20, 'name' => 'Cần Thơ', 'status' => true],
            ['id' => 21, 'name' => 'Cao Bằng', 'status' => true],
            ['id' => 22, 'name' => 'Cửu Long', 'status' => true],
            ['id' => 23, 'name' => 'Đắk Lắk', 'status' => true],
            ['id' => 24, 'name' => 'Đắc Nông', 'status' => true],
            ['id' => 25, 'name' => 'Điện Biên', 'status' => true],
            ['id' => 26, 'name' => 'Đồng Tháp', 'status' => true],
            ['id' => 27, 'name' => 'Gia Lai', 'status' => true],
            ['id' => 28, 'name' => 'Hà Giang', 'status' => true],
            ['id' => 29, 'name' => 'Hà Nam', 'status' => true],
            ['id' => 30, 'name' => 'Hà Tĩnh', 'status' => true],
            ['id' => 31, 'name' => 'Hậu Giang', 'status' => true],
            ['id' => 32, 'name' => 'Hoà Bình', 'status' => true],
            ['id' => 33, 'name' => 'Khánh Hoà', 'status' => true],
            ['id' => 34, 'name' => 'Kiên Giang', 'status' => true],
            ['id' => 35, 'name' => 'Kon Tum', 'status' => true],
            ['id' => 36, 'name' => 'Lai Châu', 'status' => true],
            ['id' => 37, 'name' => 'Lâm Đồng', 'status' => true],
            ['id' => 38, 'name' => 'Lạng Sơn', 'status' => true],
            ['id' => 39, 'name' => 'Lào Cai', 'status' => true],
            ['id' => 40, 'name' => 'Long An', 'status' => true],
            ['id' => 41, 'name' => 'Miền Bắc', 'status' => true],
            ['id' => 42, 'name' => 'Miền Nam', 'status' => true],
            ['id' => 43, 'name' => 'Miền Trung', 'status' => true],
            ['id' => 44, 'name' => 'Nam Định', 'status' => true],
            ['id' => 45, 'name' => 'Nghệ An', 'status' => true],
            ['id' => 46, 'name' => 'Ninh Bình', 'status' => true],
            ['id' => 47, 'name' => 'Ninh Thuận', 'status' => true],
            ['id' => 48, 'name' => 'Phú Thọ', 'status' => true],
            ['id' => 49, 'name' => 'Phú Yên', 'status' => true],
            ['id' => 50, 'name' => 'Quảng Bình', 'status' => true],
            ['id' => 51, 'name' => 'Quảng Nam', 'status' => true],
            ['id' => 52, 'name' => 'Quảng Ngãi', 'status' => true],
            ['id' => 53, 'name' => 'Quảng Ninh', 'status' => true],
            ['id' => 54, 'name' => 'Quảng Trị', 'status' => true],
            ['id' => 55, 'name' => 'Sóc Trăng', 'status' => true],
            ['id' => 56, 'name' => 'Sơn La', 'status' => true],
            ['id' => 57, 'name' => 'Tây Ninh', 'status' => true],
            ['id' => 58, 'name' => 'Thái Bình', 'status' => true],
            ['id' => 59, 'name' => 'Thái Nguyên', 'status' => true],
            ['id' => 60, 'name' => 'Thanh Hoá', 'status' => true],
            ['id' => 61, 'name' => 'Thừa Thiên Huế', 'status' => true],
            ['id' => 62, 'name' => 'Tiền Giang', 'status' => true],
            ['id' => 63, 'name' => 'Toàn Quốc', 'status' => true],
            ['id' => 64, 'name' => 'Trà Vinh', 'status' => true],
            ['id' => 65, 'name' => 'Tuyên Quang', 'status' => true],
            ['id' => 66, 'name' => 'Vĩnh Long', 'status' => true],
            ['id' => 67, 'name' => 'Vĩnh Phúc', 'status' => true],
            ['id' => 68, 'name' => 'Yên Bái', 'status' => true],
            ['id' => 100, 'name' => 'Nước Ngoài', 'status' => true],
        ];

        DB::table('cities')->insert($cities);
    }
}
