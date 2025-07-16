<?php

use App\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::insert([
            ['level' => 'Pemula'],
            ['level' => 'Menengah'],
            ['level' => 'Mahir'],
        ]);
    }
}
