<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CreatePelangganDummy extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 100) as $index) {
            DB::table('pelanggan')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'birthday' => $faker->date('Y-m-d', '2005-12-31'),
                'gender' => $faker->randomElement(['Male', 'Female', 'Other']),
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}