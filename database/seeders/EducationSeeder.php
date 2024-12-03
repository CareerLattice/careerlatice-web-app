<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Education;
use App\Models\Applier;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create("id_ID");
        $users = Applier::all();

        for($i = 0; $i < 10; $i++) {
            Education::create([
                'institution_name' => $faker->company,
                'grade' => $faker->randomFloat(2, 0, 4),
                'max_grade' => 4,
                'degree' => $faker->sentence,
                'field_of_study' => $faker->randomElement(['Teknik Informatika', 'Teknik Elektro', 'Teknik Mesin', 'Teknik Sipil']),
                'start_date' => $faker->dateTimeBetween('-1 year', 'now'),
                'end_date' => $faker->dateTimeBetween('now', '+3 year'),
                'description' => $faker->paragraph,

                'applier_id' => $users->random()->id,
            ]);
        }
    }
}
