<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //factory('App\Funcionary', 10)->create();
        //factory('App\Ubication', 10)->create();
        //factory('App\Dependence', 10)->create();
        $this->call('RolesTableSeeder');
        $this->call('PermissionsTableSeeder');
        $this->call('UsersTableSeeder');
    }
}
