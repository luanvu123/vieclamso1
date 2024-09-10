<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Salary;

class SalarySeeder extends Seeder
{
    public function run()
    {
        $salaryData = [
            ['name' => '3-10 triệu', 'count' => 1400, 'status' => 'active'],
            ['name' => 'Từ 10-20 triệu', 'count' => 1600, 'status' => 'active'],
            ['name' => 'Từ 20-30 triệu', 'count' => 1100, 'status' => 'active'],
            ['name' => 'Trên 30 triệu', 'count' => 900, 'status' => 'active'],
            ['name' => 'Thỏa thuận', 'count' => 900, 'status' => 'active'],
        ];

        foreach ($salaryData as $data) {
            Salary::create($data);
        }
    }
}

