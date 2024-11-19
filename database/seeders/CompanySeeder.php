<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create("id_ID");
        $companies = User::where('role', 'company')->get();
        foreach ($companies as $company) {
            $companyName = $faker->company;
            $companyEmail = $faker->companyEmail;
            Company::create([
                'address' => $faker->address,
                'description' => $faker->paragraph,
                'field' => $faker->randomElement(['Teknologi', 'Kesehatan', 'Pendidikan', 'Keuangan']),
                'user_id' => $company->id,
            ]);

            User::where('id', $company->id)->update([
                'name' => $companyName,
                'email' => $companyEmail,
            ]);
        }
    }
}
