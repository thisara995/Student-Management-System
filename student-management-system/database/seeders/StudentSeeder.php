<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('students')->insert([
                'name' => $faker->firstName . ' ' . $faker->lastName,
                'age' => $faker->numberBetween(15, 18), // Assuming typical school age
                'address' => $faker->address,
                'mobile' => '07' . $faker->numerify('#######'), // Sri Lankan mobile format
                'parent' => $faker->firstName . ' ' . $faker->lastName,
                'parent_mobile' => '07' . $faker->numerify('#######'), // Sri Lankan mobile format
            ]);
        }
    }
}
