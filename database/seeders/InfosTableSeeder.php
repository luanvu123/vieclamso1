<?php

// database/seeders/InfosTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Info;

class InfosTableSeeder extends Seeder
{
    public function run()
    {
        Info::create([
            'company_name' => 'Công ty Cổ phần TopCV Việt Nam',
            'business_license_number' => '0107307178',
            'service_license_number' => '18/SLĐTBXH-GP',
            'headquarter_address' => 'Tòa FS - GoldSeason số 47 Nguyễn Tuân, P.Thanh Xuân Trung, Q.Thanh Xuân, Hà Nội',
            'branch_address' => 'Tòa nhà Dali, 24C Phan Đăng Lưu, P.6, Q.Bình Thạnh, TP HCM',
            'qr_code_image' => 'images/qr_code.png' // Assuming the QR code image is stored in the 'public/storage/images' directory
        ]);
    }
}
