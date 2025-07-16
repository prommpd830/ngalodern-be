<?php

use App\StatusTes;
use Illuminate\Database\Seeder;

class StatusTesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusTes::insert([
            ['status' => 'Draf'],
            ['status' => 'Active'],
        ]);
    }
}
