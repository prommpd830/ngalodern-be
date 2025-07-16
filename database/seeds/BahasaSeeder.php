<?php

use App\Bahasa;
use Illuminate\Database\Seeder;

class BahasaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bahasa::insert([
            ['bahasa' => 'Indonesia'],
            ['bahasa' => 'Sunda'],
        ]);
    }
}
