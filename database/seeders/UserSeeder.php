<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create("id_ID");
        for($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'phone_number' => $faker->phoneNumber,
                'password' => Hash::make($faker->passwprd),
                'address' => $faker->address,
                'description' => $faker->paragraph,
                'birth_date' => $faker->date(),
                'start_date_premium' => $faker->date(),
                'end_date_premium' => $faker->date(),
                'profile_picture' => 'https://stockbit.com/images/stockbit.svg',
                'role' => $faker->randomElement(['user', 'admin']),
            ]);
        }
    }
}
