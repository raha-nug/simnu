<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\PWNU::create([
            'nama' => 'PWNU Jawa Barat',
            'alamat' => 'Jl. Terusan Galunggung No. 9 Kel. Lingkar Selatan Kec. Lengkong Kota Bandung 40263',
            'telp' => '0227315915',
            'email' => 'admin@nujabar.or.id',
            'website' => 'https://jabar.nu.or.id',
            'lat' => '',
            'long' => '',
            'provinsi' => '32'
        ]);
    }
}
