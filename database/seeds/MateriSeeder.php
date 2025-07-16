<?php

use App\Materi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Materi::insert([
            [
            'kode_materi' => Str::random(20),
            'id_mapel' => 1,
            'id_level' => 1,
            'id_bahasa' => 1,
            'materi' => 'Kata'
            ],

            [
            'kode_materi' => Str::random(20),
            'id_mapel' => 1,
            'id_level' => 1,
            'id_bahasa' => 1,
            'materi' => 'Frasa'
            ],

            [
            'kode_materi' => Str::random(20),
            'id_mapel' => 1,
            'id_level' => 1,
            'id_bahasa' => 1,
            'materi' => 'Klausa'
            ],

            [
            'kode_materi' => Str::random(20),
            'id_mapel' => 1,
            'id_level' => 1,
            'id_bahasa' => 1,
            'materi' => 'Kalimat'
            ],

            [
            'kode_materi' => Str::random(20),
            'id_mapel' => 1,
            'id_level' => 1,
            'id_bahasa' => 1,
            'materi' => 'Paragraf'
            ],
            
        ]);
    }
}
