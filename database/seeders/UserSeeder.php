<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create("id_ID");
        for($i = 0; $i < 5; $i++) {
            User::create(attributes: [
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('password'),
                'phone_number' => $faker->phoneNumber,
                'profile_picture' => 'assets/bbcs.jpeg',
                'role' => $faker->randomElement(['applier', 'admin', 'company']),
            ]);
        }
    }
}
