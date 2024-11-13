<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('teachers')->insert([
                'name' => $faker->firstName . ' ' . $faker->lastName,
                'age' => $faker->numberBetween(30, 40), // Assuming typical school age
                'address' => $faker->address,
                'mobile' => '07' . $faker->numerify('#######'), // Sri Lankan mobile format
            ]);
        }
    }
}
