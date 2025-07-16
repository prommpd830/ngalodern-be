<?php

use App\UserRoles;
use Illuminate\Database\Seeder;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRoles::insert([
            ['role' => 'Admin'],
            ['role' => 'Editor'],
            ['role' => 'User'],
        ]);
    }
}
