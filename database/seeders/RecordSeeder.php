<?php

namespace Database\Seeders;

use App\Models\Record;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecordSeeder extends Seeder
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
                'student_id' => 'S0001',
                'course_id' => 'C001',
                'grade' => 56,
            ],
            [
                'student_id' => 'S0001',
                'course_id' => 'C005',
                'grade' => 73,
            ],
            [
                'student_id' => 'S0002',
                'course_id' => 'C002',
                'grade' => 92,
            ],
            [
                'student_id' => 'S0002',
                'course_id' => 'C005',
                'grade' => 63,
            ],
            [
                'student_id' => 'S0003',
                'course_id' => 'C001',
                'grade' => 92,
            ],
            [
                'student_id' => 'S0003',
                'course_id' => 'C003',
                'grade' => 88,
            ],
            [
                'student_id' => 'S0003',
                'course_id' => 'C005',
                'grade' => 100,
            ],
            [
                'student_id' => 'S0004',
                'course_id' => 'C001',
                'grade' => 75,
            ],
            [
                'student_id' => 'S0004',
                'course_id' => 'C003',
                'grade' => 88,
            ],
            [
                'student_id' => 'S0004',
                'course_id' => 'C005',
                'grade' => 68,
            ],
            [
                'student_id' => 'S0005',
                'course_id' => 'C002',
                'grade' => 45,
            ],
        ];

        foreach ($seedData as $record) {
            Record::create($record);
        }
    }
}
