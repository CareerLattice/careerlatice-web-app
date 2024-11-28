<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;

use App\Models\Job;
use App\Models\Skill;
use App\Models\JobSkill;

class JobSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create("id_ID");
        $jobs = Job::all();
        $skills = Skill::all();

        for ($i = 0; $i < 10; $i++) {
            JobSkill::firstOrCreate([
                "job_id" => $jobs->random()->id,
                "skill_id" => $skills->random()->id,
            ]);
        }
    }
}
