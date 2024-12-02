<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CompanySeeder::class,
            ApplierSeeder::class,
            SkillSeeder::class,
            UserSkillSeeder::class,
            JobSeeder::class,
            JobSkillSeeder::class,
            JobApplicationSeeder::class,
            UserHistorySeeder::class,
        ]);
    }
}
