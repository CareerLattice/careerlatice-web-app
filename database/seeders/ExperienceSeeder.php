<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Applier;
use App\Models\Experience;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');
        $applier = Applier::all();
        for($i = 0; $i < 10; $i++) {
            Experience::create([
                'title' => $faker->jobTitle,
                'company_name' => $faker->company,
                'job_type' => $faker->randomElement(['Full-time', 'Part-time', 'Freelance', 'Internship']),
                'start_date' => $faker->dateTimeBetween('-5 years', 'now'),
                'end_date' => $faker->dateTimeBetween('now', '+5 years'),
                'address' => $faker->address,
                'description' => $faker->paragraph,
                'company_picture' => "default/profile_picture.jpg",
                'applier_id' => $applier->random()->id,
            ]);
        }
    }
}
