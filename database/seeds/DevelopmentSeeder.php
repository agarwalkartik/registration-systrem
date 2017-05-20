<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Permission;
use App\Models\Menu;
use App\Models\Route;
use App\Models\Role;

class DevelopmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 100; $i++ )
           DB::table('students')->insert([
            'aadhar_card_number' => $i,
            'university_roll_number' => str_random(10)
        ]);
        // Add migration code for the development environment.

    }
}
