<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\JobApplication;

class JobApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $jobs = Job::all();
        $faker = Factory::create("id_ID");
        for($i = 0; $i < 20; $i++) {
            JobApplication::create([
                'user_id' => $users->random()->id,
                'job_id' => $jobs->random()->id,
                'applied_at' => $faker->text,
                'status' => $faker->randomElement(['pending', 'accepted', 'rejected']),
            ]);
        }
    }
}
