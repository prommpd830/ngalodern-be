<?php

use Illuminate\Database\Seeder;
use App\FooterKontak;

class FooterKontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FooterKontak::insert([
            'facebook' => 'unpad',
            'twitter' => 'unpad',
            'instagram' => 'universitaspadjadjaran',
            'youtube' => 'unpad',
            'linkedin' => 'universitas-padjadjaran'
        ]);
    }
}
