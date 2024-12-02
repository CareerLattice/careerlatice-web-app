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
                'password' => Hash::make('12345678'),
                'phone_number' => $faker->phoneNumber,
                'profile_picture' => 'user_upload/profile_picture/default_profile.jpg',
                'role' => $faker->randomElement(['applier', 'admin', 'company']),
            ]);
        }

        // Buat minimal masing-masing 1 user dengan role Applier, Company, dan Admin
        User::create(attributes: [
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => Hash::make('12345678'),
            'phone_number' => $faker->phoneNumber,
            'profile_picture' => 'user_upload/profile_picture/default_profile.jpg',
            'role' => 'applier',
        ]);

        User::create(attributes: [
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => Hash::make('12345678'),
            'phone_number' => $faker->phoneNumber,
            'profile_picture' => 'user_upload/profile_picture/default_profile.jpg',
            'role' => 'company',
        ]);

        User::create(attributes: [
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => Hash::make('12345678'),
            'phone_number' => $faker->phoneNumber,
            'profile_picture' => 'user_upload/profile_picture/default_profile.jpg',
            'role' => 'admin',
        ]);
    }
}
