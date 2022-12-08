<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
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
                'id' => 'S0001',
                'name' => '一心',
                'department_id' => 'D001',
            ],
            [
                'id' => 'S0002',
                'name' => '二聖',
                'department_id' => 'D001',
            ],
            [
                'id' => 'S0003',
                'name' => '三多',
                'department_id' => 'D002',
            ],
            [
                'id' => 'S0004',
                'name' => '四維',
                'department_id' => 'D002',
            ],
            [
                'id' => 'S0005',
                'name' => '五福',
                'department_id' => 'D002',
            ],
        ];

        foreach ($seedData as $student) {
            Student::create($student);
        }
    }
}
