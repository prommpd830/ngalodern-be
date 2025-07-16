<?php

use Illuminate\Database\Seeder;
use App\FooterLogo;

class FooterLogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FooterLogo::insert([
            'title' => 'UNPAD',
            'logo' => 'logo-unpad-1.png'
        ]);
    }
}
