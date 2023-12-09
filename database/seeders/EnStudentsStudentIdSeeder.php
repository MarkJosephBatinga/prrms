<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EnStudent;

class EnStudentsStudentIdSeeder extends Seeder
{
    public function run()
    {
        $year = 2022;

        // Loop through all en_students and add student_id
        EnStudent::all()->each(function ($enStudent, $index) use ($year) {
            $studentId = sprintf('%d-%03d', $year, $index + 1);

            $enStudent->update(['student_id' => $studentId]);
        });
    }
}

