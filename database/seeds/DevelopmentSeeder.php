<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Permission;
use App\Models\Menu;
use App\Models\Route;
use App\Models\Role;
use App\Models\Student;
class DevelopmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 5; $i++ )
           DB::table('students')->insert([
            Student::AADHAAR_CARD_NUMBER => $i,
            Student::UNIVERSITY_ROLL_NUMBER => str_random(10),
            Student::STUDENT_MOBILE_NUMBER => rand(1111111111,9999999999),
            'created_at' => time(),
            'updated_at' => time()
        ]);
        // Add migration code for the development environment.

    }
}
