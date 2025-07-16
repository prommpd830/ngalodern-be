<?php

use App\UserKategori;
use Illuminate\Database\Seeder;

class UserKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserKategori::insert([
            ['kategori' => 'Umum'],
            ['kategori' => 'Pelajar'],
            ['kategori' => 'Mahasiswa'],
        ]);
    }
}
