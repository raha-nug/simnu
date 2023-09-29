<?php

namespace Database\Seeders;

use App\Models\Users;
use App\Models\UserGroup;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Users::query()->create([
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin1234',
        ]);
    }
}
