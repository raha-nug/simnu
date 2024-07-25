<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RantingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $query = file_get_contents("lembaga_202407251931.sql", true);
        $queries = explode(';', $query);

        DB::transaction(function () use ($queries) {
            foreach ($queries as $item) {
                if (!empty(trim($item))) {
                    DB::statement($item);
                }
            }
        });
    }
}
