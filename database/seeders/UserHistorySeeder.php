<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;

use App\Models\UserHistory;
use App\Models\Applier;

class UserHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $users = Applier::all();

        for($i = 0; $i < 10; $i++) {
            UserHistory::create([
                'applier_id' => $users->random()->id,
                'name' => $faker->sentence,
                'start_date' => $faker->dateTimeBetween('-1 year', 'now'),
                'end_date' => $faker->dateTimeBetween('now', '+1 year'),
                'duration' => $faker->randomElement([1, 3, 6, 12]),
                'price' => $faker->randomElement([10000, 28000, 50000, 90000]),
            ]);
        }
    }
}
