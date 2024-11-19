<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Job;
use App\Models\Company;
class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = Company::all();
        $faker = Factory::create("id_ID");
        for($i = 0; $i < 15; $i++) {
            Job::create([
                'job_type' => $faker->randomElement(['Full Time', 'Part Time', 'Internship']),
                'title' => $faker->jobTitle,
                'address' => $faker->address,
                'description' => $faker->paragraph,
                'requirement' => $faker->paragraph,
                'benefit' => $faker->paragraph,
                'person_in_charge' => $faker->name,
                'contact_person' => $faker->phoneNumber,
                'is_active' => $faker->boolean,
                'job_picture' => $faker->imageUrl(),
                'company_id' => $companies->random()->id,
            ]);
        }
    }
}
