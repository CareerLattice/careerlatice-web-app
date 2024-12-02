<?php

namespace Database\Seeders;

use App\Models\Applier;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;

class ApplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create("id_ID");
        $users = User::where('role', 'applier')->get();
        foreach($users as $user){
            Applier::create(attributes: [
                'address' => $faker->address,
                'description' => $faker->paragraph,
                'birth_date' => $faker->date(),
                'start_date_premium' => $faker->dateTimeBetween('-1 year', 'now'),
                'end_date_premium' => $faker->dateTimeBetween('now', '+1 year'),
                'user_id' => $user->id,
                'cv_url' => 'Kalender.pdf',
                'headline' => $faker->sentence,
            ]);
        }
    }
}
