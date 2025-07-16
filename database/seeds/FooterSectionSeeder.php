S<?php

use Illuminate\Database\Seeder;
use App\FooterSection;

class FooterSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FooterSection::insert([
            [
                'title' => 'Alamat Office',
                'deskripsi_1' => 'Direktorat Tata Kelola, Legal, & Komunikasi Kantor Komunikasi Publik',
                'deskripsi_2' => 'Gedung Rektorat Unpad Kampus Jatinangor Jln. Raya Bandung-Sumedang Km. 21 Jatinangor, Kab. Sumedang 45363 Jawa Barat',
                'telepon' => '(022) 842 88888',
                'fax' => '(022) 842 88898',
                'email' => 'humas@unpad.ac.id'
            ],
            [
                'title' => 'Departement FIB UNPAD',
                'deskripsi_1' => 'Fakultas Ilmu Budaya Universitas Padjadjaran Jalan Raya Bandung – Sumedang Km. 21 Jatinangor – Sumedang 45363',
                'deskripsi_2' => null,
                'telepon' => '+62 227796482',
                'fax' => '(022) +62 227796482',
                'email' => 'fib@unpad.ac.id'
            ],
        ]);
    }
}
