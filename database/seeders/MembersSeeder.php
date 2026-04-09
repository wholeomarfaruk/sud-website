<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            [
                'id' => 1,
                'name' => 'John Doe',
                'designation' => 'CEO',
                'image' => 'https://via.placeholder.com/150',
                'description' => 'John Doe is the CEO of the company.',
                'status' => 1,
                'order' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Jane Smith',
                'designation' => 'CTO',
                'image' => 'https://via.placeholder.com/150',
                'description' => 'Jane Smith is the CTO of the company.',
                'status' => 1,
                'order' => 2,
            ],
            [
                'id' => 3,
                'name' => 'Bob Johnson',
                'designation' => 'CFO',
                'image' => 'https://via.placeholder.com/150',
                'description' => 'Bob Johnson is the CFO of the company.',
                'status' => 1,
                'order' => 2,
            ],
            [
                'id' => 4,
                'name' => 'Alice Williams',
                'designation' => 'HR Director',
                'image' => 'https://via.placeholder.com/150',
                'description' => 'Alice Williams is the HR Director of the company.',
                'status' => 1,
                'order' => 3,
            ]

        ];
        foreach ($members as $member) {
            \App\Models\Members::updateOrCreate(['id' => $member['id']], $member);
        }
    }
}

