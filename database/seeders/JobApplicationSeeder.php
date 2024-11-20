<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\JobApplication;
use App\Models\Applier;
use App\Models\Job;

class JobApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = Applier::all();
        $jobs = Job::all();
        $faker = Factory::create("id_ID");
        for($i = 0; $i < 30; $i++) {
            JobApplication::create([
                'applier_id' => $users->random()->id,
                'job_id' => $jobs->random()->id,
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'status' => $faker->randomElement(['pending', 'on process','accepted', 'rejected']),
            ]);
        }
    }
}
