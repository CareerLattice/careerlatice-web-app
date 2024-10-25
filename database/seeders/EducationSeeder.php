<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Education;
use App\Models\User;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create("id_ID");
        $user = User::all();

        for($i = 0; $i < 10; $i++) {
            Education::create([
                'user_id' => $faker->$user->random()->id,
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
