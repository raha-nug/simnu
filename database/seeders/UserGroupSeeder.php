<?php

namespace Database\Seeders;

use App\Models\UserGroup;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserGroup::query()->create([
            'nama_user_group' => 'AdminSuper',
            'deskripsi_user_group' => 'Admin',
            'super_admin' => 'Yes'
        ]);
    }
}
