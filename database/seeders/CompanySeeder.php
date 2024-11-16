<?php

namespace Database\Seeders;

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
        for($i = 0; $i < 15; $i++) {
            Company::create([
                'name' => $faker->company,
                'email' => $faker->companyEmail,
                'phone_number' => $faker->phoneNumber,
                'address' => $faker->address,
                'description' => $faker->paragraph,
                'field' => $faker->randomElement(['Teknologi', 'Kesehatan', 'Pendidikan', 'Keuangan']),
                'password' => bcrypt('password'),
                'logo' => 'https://stockbit.com/images/stockbit.svg',
            ]);
        }
    }
}
