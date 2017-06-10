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

        // Create role: registrar
        // Assign permission basic-authenticated
        $roleRegistrar = Role::create([
            "name"          => "registrar",
            "display_name"  => "Registrar",
            "description"   => "Registrar Depertment Users",
            "enabled"       => true
        ]);

        $userRegistrar = User::create([
            "first_name"    => "Registrar",
            "last_name"     => "KEC",
            "username"      => "registrar.kec",
            "email"         => "registrar@kec.edu",
            "password"      => "password",
            "auth_type"     => "internal",
            "enabled"       => true
        ]);
        $userRegistrar->roles()->attach($roleRegistrar->id);
    }
}
