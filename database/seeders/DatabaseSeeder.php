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
            JobSeeder::class,
            JobApplicationSeeder::class,
            UserHistorySeeder::class,
            EducationSeeder::class,
            ExperienceSeeder::class,
        ]);
    }
}
