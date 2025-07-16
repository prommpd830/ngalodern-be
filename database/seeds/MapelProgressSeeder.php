<?php

use App\MapelProgress;
use Illuminate\Database\Seeder;

class MapelProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MapelProgress::insert([
            [
            	'id_user' => 3,
            	'id_mapel' => 1,
            	'id_level' => 1
            ],
            [
            	'id_user' => 3,
            	'id_mapel' => 2,
            	'id_level' => 1
            ],
        ]);
    }
}
