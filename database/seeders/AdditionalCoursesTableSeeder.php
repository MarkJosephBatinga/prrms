<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdditionalCoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
            // Core Subjects
            [
                'course_category' => 'Core Subjects',
                'course_code' => 'Philo 301',
                'descriptive_title' => 'Philosophies & Foundational Perspective in Education',
                'units' => 3,
                'program_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_category' => 'Core Subjects',
                'course_code' => 'Philo 302',
                'descriptive_title' => 'Critical Perspectives & Comparative Studies in Education',
                'units' => 3,
                'program_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_category' => 'Core Subjects',
                'course_code' => 'Philo 303',
                'descriptive_title' => 'Quantitative Research Methods',
                'units' => 3,
                'program_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Major Subjects
            [
                'course_category' => 'Major Subjects',
                'course_code' => 'MEd 311',
                'descriptive_title' => 'Algebraic Number Theory',
                'units' => 3,
                'program_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_category' => 'Major Subjects',
                'course_code' => 'MEd 312',
                'descriptive_title' => 'Advanced Calculus',
                'units' => 3,
                'program_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_category' => 'Major Subjects',
                'course_code' => 'MEd 313',
                'descriptive_title' => 'Theory of Ordinary Differential Equations',
                'units' => 3,
                'program_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Elective Subjects
            [
                'course_category' => 'Elective Subjects',
                'course_code' => 'MEd 321',
                'descriptive_title' => 'Real Analysis',
                'units' => 3,
                'program_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_category' => 'Elective Subjects',
                'course_code' => 'MEd 322',
                'descriptive_title' => 'Graph Theory',
                'units' => 3,
                'program_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_category' => 'Elective Subjects',
                'course_code' => 'MEd 323',
                'descriptive_title' => 'Combinatorial Mathematics',
                'units' => 3,
                'program_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Institutional Requirement
            [
                'course_category' => 'Institutional Requirement',
                'course_code' => 'GRR 398',
                'descriptive_title' => 'Advanced Information Tech Mgt System',
                'units' => 3,
                'program_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_category' => 'Institutional Requirement',
                'course_code' => 'GRR 399',
                'descriptive_title' => 'Graduate Seminar (Dissertation)',
                'units' => 1,
                'program_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_category' => 'Institutional Requirement',
                'course_code' => 'GR 400',
                'descriptive_title' => 'Dissertation Writing',
                'units' => 12,
                'program_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
