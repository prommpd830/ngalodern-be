<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BahasaSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(UserKategoriSeeder::class);
        $this->call(UserRolesSeeder::class);
        $this->call(MapelSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MateriSeeder::class);
        $this->call(MapelProgressSeeder::class);
        $this->call(StatusTesSeeder::class);
        $this->call(LandingPageSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(PanduanSeeder::class);
        $this->call(FooterSectionSeeder::class);
        $this->call(FooterLogoSeeder::class);
        $this->call(FooterKontakSeeder::class);
    }
}
