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
            $transaction = new UserHistory([
                'applier_id' => $users->random()->id,
                'name' => $faker->sentence,
                'start_date' => $faker->dateTimeBetween('-3 year', 'now'),
                'duration' => $faker->randomElement([3, 6, 12]),
                'status' => $faker->randomElement(['success', 'pending']),
            ]);

            $transaction->price = match($transaction->duration) {
                3 => 1499000,
                6 => 2399000,
                12 => 3799000,
            };

            $transaction->name = (string) $transaction->duration . ' Month Subscription';
            $transaction->end_date = (clone $transaction->start_date)->modify("+{$transaction->duration} months");
            $transaction->save();
        }
    }
}
