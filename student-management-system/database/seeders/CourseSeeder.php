<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CourseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('courses')->insert([
                'name' => $faker->words(3, true),  // Example: "Advanced Physics Concepts"
                'title' => $faker->sentence(4),  // Example: "Introduction to Advanced Physics"
                'description' => $faker->paragraph(3), // Example course description
                'duration' => $faker->numberBetween(1, 12) . ' months', // Random duration in months
                'syllabus' => $faker->paragraph(5), // Example syllabus content
                'teacher_id' => $faker->numberBetween(1, 10), // Assuming 10 teachers exist with IDs 1-10
            ]);
        }
    }
}
