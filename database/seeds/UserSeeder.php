<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
            'id_role' => 1,
            'id_kategori' => 1,
            'npm' => null,
            'nisn' => null,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'no_telp' => '08728374823'
            ],

            [
            'id_role' => 2,
            'id_kategori' => 1,
            'npm' => null,
            'nisn' => null,
            'name' => 'Editor',
            'email' => 'editor@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'no_telp' => '08728387943'
            ],

            [
            'id_role' => 3,
            'id_kategori' => 1,
            'npm' => null,
            'nisn' => null,
            'name' => 'User',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'no_telp' => '08728785674'
            ],

        ]);
    }
}
