<?php

namespace Database\Seeders;

use App\Models\Users;
use App\Models\UserGroup;
use App\Models\UserCredentials;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $user_group = UserGroup::query()->create([
            'nama_grup' => 'Admin Super',
        ]);

        UserCredentials::query()->create([
            'id_grup' => $user_group->id,
            'can_update' => true,
            'can_create' => true,
            'can_delete' => true,
            'can_manage_user' => true,
        ]);

        Users::query()->create([
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin1234',
            'id_grup' => $user_group->id
        ]);
    }
}
