<?php

use App\Mapel;
use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mapel::insert([
            ['mapel' => 'Bahasa Arab'],
            ['mapel' => 'Bahasa Inggris'],
        ]);
    }
}
