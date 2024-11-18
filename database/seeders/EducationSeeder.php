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
                'user_id' => $users->random()->id,
                'institution' => $faker->company,
                'degree' => $faker->sentence,
                'field_of_study' => $faker->randomElement(['Teknik Informatika', 'Teknik Elektro', 'Teknik Mesin', 'Teknik Sipil']),
                'start_year' => $faker->year,
                'end_year' => $faker->year,
                'is_graduated' => $faker->boolean,
            ]);
        }
    }
}
