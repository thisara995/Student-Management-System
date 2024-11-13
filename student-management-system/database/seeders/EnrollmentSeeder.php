<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class EnrollmentSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('enrollments')->insert([
                'enroll_no' => strtoupper($faker->lexify('ENR???') . $faker->numerify('###')), // Example: "ENR123456"
                'batch_id' => $faker->numberBetween(1, 10), // Assuming 10 batches with IDs 1-10
                'student_id' => $faker->numberBetween(1, 10), // Assuming 10 students with IDs 1-10
                'join_date' => $faker->dateTimeBetween('-1 years', 'now')->format('Y-m-d'), // Random join date in the past year
                'fee' => $faker->numberBetween(10000, 50000), // Store fee as a numeric value only
            ]);
        }
    }
}
