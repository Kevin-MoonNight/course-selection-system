<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seedData = [
            [
                'id' => 'C001',
                'name' => '資料庫系統',
                'credit' => 4,
            ],
            [
                'id' => 'C002',
                'name' => '手機程式',
                'credit' => 4,
            ],
            [
                'id' => 'C003',
                'name' => '機器人程式',
                'credit' => 3,
            ],
            [
                'id' => 'C004',
                'name' => '物聯網技術',
                'credit' => 4,
            ],
            [
                'id' => 'C005',
                'name' => '大數據分析',
                'credit' => 3,
            ],
        ];

        foreach ($seedData as $course) {
            Course::create($course);
        }
    }
}
