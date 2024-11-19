<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\UserSkill;
use App\Models\Skill;
use App\Models\Applier;

class UserSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create("id_ID");
        $users = Applier::all();
        $skills = Skill::all();

        for($i = 0; $i < 20; $i++) {
            UserSkill::create([
                "user_id" => $users->random()->id,
                "skill_id" => $skills->random()->id,
            ]);
        }
    }
}
