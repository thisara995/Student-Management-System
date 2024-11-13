<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class BatchSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('batches')->insert([
                'name' => 'Batch ' . $faker->unique()->numberBetween(100, 999), // Example: "Batch 101"
                'course_id' => $faker->numberBetween(1, 10), // Assuming 10 courses exist with IDs 1-10
                'start_date' => $faker->dateTimeBetween('-1 years', 'now')->format('Y-m-d'), // Random start date in the past year
            ]);
        }
    }
}
