<?php

use Illuminate\Database\Seeder;
use App\LandingPage;

class LandingPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LandingPage::insert([
            'logo' => 'PNG Logo Ngalodern 3.png',
            'title' => 'Ngalodren | Universitas Padjadjaran',
            'header' => 'Selamat Datang Di Ngalodren',
            'video_1' => 'https://www.youtube.com/embed/HqAMb6kqlLs',
            'video_2' => 'https://www.youtube.com/embed/pZqk57Xvujs',
            'video_3' => 'https://www.youtube.com/embed/u7zS2XpMpsc'
        ]);
    }
}
