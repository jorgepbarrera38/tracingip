<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Superadmin',
            'username' => 'superadmin',
            'password' => bcrypt(9461)
        ]);
        $user->roles()->sync([1,1]);
    }
}
