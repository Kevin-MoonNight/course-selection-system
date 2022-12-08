<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
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
                'id' => 'D001',
                'name' => '資工系',
                'chair' => '李主任',
            ],
            [
                'id' => 'D002',
                'name' => '資管系',
                'chair' => '林主任',
            ],
            [
                'id' => 'D003',
                'name' => '企管系',
                'chair' => '李主任',
            ],
            [
                'id' => 'D004',
                'name' => '工管系',
                'chair' => '楊主任',
            ],
        ];

        foreach ($seedData as $department) {
            Department::create($department);
        }
    }
}
