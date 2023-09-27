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
        $user_group = UserGroup::query()->where('super_admin','Yes')->first();
        Users::query()->create([
            'email' => 'admin@gmail.com',
            'password' => 'admin1234',
            'id_user_group' => $user_group->id
        ]);
    }
}
