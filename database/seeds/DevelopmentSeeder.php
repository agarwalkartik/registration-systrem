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
        for($i = 1; $i <= 500; $i++ )
           DB::table('students')->insert([
            Student::AADHAAR_CARD_NUMBER => $i,
            Student::UNIVERSITY_ROLL_NUMBER => rand(111111,999999),
            Student::REGISTRATION_STATUS => Student::REGISTRATION_STATUS_NOT_SUBMITTED,
            Student::STUDENT_NAME => str_random(5),
            Student::FATHER_NAME => str_random(5),
            Student::STUDENT_MOBILE_NUMBER => rand(1111111111,9999999999),
            'created_at' => time(),
            'updated_at' => time()
        ]);

        $permVerifyStudents = Permission::create([
            'name'          => 'verify-students',
            'display_name'  => 'Verify Students',
            'description'   => 'Permission to verify student registration details',
            'enabled'       => true,
        ]);
        $routeVerifyStudents = Route::where('name', 'verify.students')->get()->first();
        $routeVerifyStudents->permission()->associate($permVerifyStudents);
        $routeVerifyStudents->save();
        $roleRegistrar = Role::create([
            "name"          => "registrar",
            "display_name"  => "Registrar",
            "description"   => "Registrar Depertment Users",
            "enabled"       => true
        ]);
        $roleRegistrar->perms()->attach($permVerifyStudents->id);

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

          $menuVerifyStudents = Menu::create([
            'name'          => 'verify-students',
            'label'         => 'Verify Students',
            'position'      => 999,                 // Artificially high number to ensure that it is rendered last.
            'icon'          => 'fa fa-user',
            'separator'     => false,
            'url'           => null,                // No url.
            'enabled'       => true,
            'parent_id'     => 1,       // Parent is home.
            'route_id'      => $routeVerifyStudents->id,
            'permission_id' => null,                // Get permission from sub-items. If the user has permission to see/use
                                                    // any sub-items, the admin menu will be rendered, otherwise it will
                                                    // not.
        ]);
    }
}
