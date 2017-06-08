<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();


        // Example of how to call a seeder script for a given environment.
       if( App::environment() === 'development' )
       {
           $this->call('DevelopmentSeeder');
            $this->call('ProductionSeeder');
       }
       if( App::environment() === 'production' )
       {
            $this->call('ProductionSeeder');
       }

        Model::reguard();
    }
}
