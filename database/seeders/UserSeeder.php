<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Users;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Users::create([
            'name' => 'John Due',
            'department_id' => 1, 
            'designation_id' => 1, 
            'phone_number' => '1234567890',
        ]);

        Users::create([
            'name' => 'Tommy Mark',
            'department_id' => 2, 
            'designation_id' => 2, 
            'phone_number' => '1234567899',
        ]);
    }
}
