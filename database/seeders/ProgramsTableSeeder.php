<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('programs')->insert([
            [
                'program_name' => 'Doctor of Philosophy in Science Education',
                'effective_school_year' => '2014-2015',
                'dean' => 'PAULITO C. NISPEROS',
                'program_chair' => 'ALOYSIUS J. AURELIO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'program_name' => 'Doctor of Philosophy in Mathematics Education',
                'effective_school_year' => '2017-2018',
                'dean' => 'PAULITO C. NISPEROS',
                'program_chair' => 'ALOYSIUS J. AURELIO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more programs as needed
        ]);
    }
}
