<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\UserSkill;
use App\Models\User;
use App\Models\Skill;

class UserSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create("id_ID");
        $users = User::all();
        $skills = Skill::all();

        for($i = 0; $i < 100; $i++) {
            UserSkill::create([
                "user_id" => $users->random()->id,
                "skill_id" => $skills->random()->id,
            ]);
        }
    }
}
