<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
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
                'program_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_category' => 'Core Subjects',
                'course_code' => 'Philo 302',
                'descriptive_title' => 'Critical Perspectives & Comparative Studies in Education',
                'units' => 3,
                'program_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_category' => 'Core Subjects',
                'course_code' => 'Philo 303',
                'descriptive_title' => 'Quantitative Research Methods',
                'units' => 3,
                'program_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Major Subjects
            [
                'course_category' => 'Major Subjects',
                'course_code' => 'SEd 311',
                'descriptive_title' => 'Molecular Biology and Biotechnology',
                'units' => 3,
                'program_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_category' => 'Major Subjects',
                'course_code' => 'SEd 312',
                'descriptive_title' => 'Geology and Astronomy',
                'units' => 3,
                'program_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_category' => 'Major Subjects',
                'course_code' => 'SEd 313',
                'descriptive_title' => 'Recent Advances in Chemistry',
                'units' => 3,
                'program_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Elective Subjects
            [
                'course_category' => 'Elective Subjects',
                'course_code' => 'SEd 321',
                'descriptive_title' => 'Recent Advances in Scientific Research',
                'units' => 3,
                'program_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_category' => 'Elective Subjects',
                'course_code' => 'SEd 322',
                'descriptive_title' => 'Evaluation in Science Education',
                'units' => 3,
                'program_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_category' => 'Elective Subjects',
                'course_code' => 'SEd 323',
                'descriptive_title' => 'Scientific Research Design and Instrumentation',
                'units' => 3,
                'program_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Institutional Requirement
            [
                'course_category' => 'Institutional Requirement',
                'course_code' => 'GR 398',
                'descriptive_title' => 'Advance Information Tech. & Management System',
                'units' => 3,
                'program_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_category' => 'Institutional Requirement',
                'course_code' => 'GR 399',
                'descriptive_title' => 'Seminar in Dissertation Writing',
                'units' => 1,
                'program_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_category' => 'Institutional Requirement',
                'course_code' => 'DW 400',
                'descriptive_title' => 'Dissertation Writing',
                'units' => 12,
                'program_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
