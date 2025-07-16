<?php

use Illuminate\Database\Seeder;
use App\Panduan;

class PanduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Panduan::insert([
            'title' => 'Belajar di Ngalodren',
            'subtitle' => 'Ada 3 tahap untuk membantumu meningkatkan kemampuan dalam pembelajaran anda.',
            'image_1' => 'online-learning.png',
            'image_2' => 'exams.png',
            'image_3' => 'skor.png',
            'konten_title_1' => 'Selesaikan Materi',
            'konten_title_2' => 'Kerjakan Ujian',
            'konten_title_3' => 'Dapatkan Skor',
            'konten_subtitle_1' => 'Materi berupa video, modul materi',
            'konten_subtitle_2' => 'Ujian dapat dilakukan setelah anda menyelesaikan materi',
            'konten_subtitle_3' => 'Skor didapatkan setelah anda menyelesaikan semua ujian'
        ]);
    }
}
