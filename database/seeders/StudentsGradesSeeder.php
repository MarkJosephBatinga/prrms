<?php

// database/seeders/StudentsGradesSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudentsGrade;
use App\Models\EnStudent;

class StudentsGradesSeeder extends Seeder
{
    public function run()
    {
        EnStudent::all()->each(function ($student) {
            $this->createGradesForSemester($student, 'First Semester');

            $this->createGradesForSemester($student, 'Second Semester');
        });
    }

    private function createGradesForSemester($student, $semester)
    {
        switch ($student->program) {
            case 'Masters in Computer Science':
                $this->createComputerScienceGrades($student, $semester);
                break;

            case 'Doctors in Business Administration':
                $this->createBusinessAdministrationGrades($student, $semester);
                break;

            case 'Doctor of Philisophy in Mathematics':
                $this->createMathematicsGrades($student, $semester);
                break;

            case 'Doctor of Science in Physics':
                $this->createPhysicsGrades($student, $semester);
                break;

            case 'Doctor of Science in Chemistry':
                $this->createChemistryGrades($student, $semester);
                break;

            case 'Doctor of Science in Engineering':
                $this->createEngineeringGrades($student, $semester);
                break;

            case 'Doctor of Philisophy in Psychology':
                $this->createPsychologyGrades($student, $semester);
                break;

            case 'Doctor of Science in Political Science':
                $this->createPoliticalScienceGrades($student, $semester);
                break;

            case 'Doctor of Philisophy in Sociology':
                $this->createSociologyGrades($student, $semester);
                break;

            case 'Doctor of Philisophy in History':
                $this->createHistoryGrades($student, $semester);
                break;

            case 'Doctor of Philisophy in English Literature':
                $this->createEnglishLiteratureGrades($student, $semester);
                break;
        }
    }

    private function createComputerScienceGrades($student, $semester)
    {
        for ($i = 1; $i <= 10; $i++) {
            $finalGrade = mt_rand(70, 100); // Randomize final grades between 70 and 100

            // Check if the final grade is 75 or below
            $remarks = ($finalGrade <= 75) ? 'Failed' : 'Passed';

            StudentsGrade::create([
                'term' => $semester,
                'code_no' => "CS{$i}",
                'course_no' => "CS{$i}01",
                'descriptive_title' => "Computer Science Subject {$i}",
                'units' => 3,
                'final_grades' => $finalGrade,
                'removal_rating' => 'N/A',
                'remarks' => $remarks,
                'student_id' => $student->id,
            ]);
        }
    }

    private function createBusinessAdministrationGrades($student, $semester)
    {
        for ($i = 1; $i <= 10; $i++) {
            $finalGrade = mt_rand(70, 100); // Randomize final grades between 70 and 100

            // Check if the final grade is 75 or below
            $remarks = ($finalGrade <= 75) ? 'Failed' : 'Passed';

            StudentsGrade::create([
                'term' => $semester,
                'code_no' => "BA{$i}",
                'course_no' => "BA{$i}01",
                'descriptive_title' => "Business Administration Subject {$i}",
                'units' => 3,
                'final_grades' => $finalGrade,
                'removal_rating' => 'N/A',
                'remarks' => $remarks,
                'student_id' => $student->id,
            ]);
        }
    }

    private function createMathematicsGrades($student, $semester)
    {
        for ($i = 1; $i <= 10; $i++) {
            $finalGrade = mt_rand(70, 100); // Randomize final grades between 70 and 100

            // Check if the final grade is 75 or below
            $remarks = ($finalGrade <= 75) ? 'Failed' : 'Passed';

            StudentsGrade::create([
                'term' => $semester,
                'code_no' => "BA{$i}",
                'course_no' => "BA{$i}01",
                'descriptive_title' => "Mathematics Subject {$i}",
                'units' => 3,
                'final_grades' => $finalGrade,
                'removal_rating' => 'N/A',
                'remarks' => $remarks,
                'student_id' => $student->id,
            ]);
        }
    }

    private function createPhysicsGrades($student, $semester)
    {
        for ($i = 1; $i <= 10; $i++) {
            $finalGrade = mt_rand(70, 100); // Randomize final grades between 70 and 100

            // Check if the final grade is 75 or below
            $remarks = ($finalGrade <= 75) ? 'Failed' : 'Passed';

            StudentsGrade::create([
                'term' => $semester,
                'code_no' => "BA{$i}",
                'course_no' => "BA{$i}01",
                'descriptive_title' => "Physics Subject {$i}",
                'units' => 3,
                'final_grades' => $finalGrade,
                'removal_rating' => 'N/A',
                'remarks' => $remarks,
                'student_id' => $student->id,
            ]);
        }
    }

    private function createChemistryGrades($student, $semester)
    {
        for ($i = 1; $i <= 10; $i++) {
            $finalGrade = mt_rand(70, 100); // Randomize final grades between 70 and 100

            // Check if the final grade is 75 or below
            $remarks = ($finalGrade <= 75) ? 'Failed' : 'Passed';

            StudentsGrade::create([
                'term' => $semester,
                'code_no' => "BA{$i}",
                'course_no' => "BA{$i}01",
                'descriptive_title' => "Chemistry Subject {$i}",
                'units' => 3,
                'final_grades' => $finalGrade,
                'removal_rating' => 'N/A',
                'remarks' => $remarks,
                'student_id' => $student->id,
            ]);
        }
    }

    private function createPoliticalScienceGrades($student, $semester)
    {
        for ($i = 1; $i <= 10; $i++) {
            $finalGrade = mt_rand(70, 100); // Randomize final grades between 70 and 100

            // Check if the final grade is 75 or below
            $remarks = ($finalGrade <= 75) ? 'Failed' : 'Passed';

            StudentsGrade::create([
                'term' => $semester,
                'code_no' => "BA{$i}",
                'course_no' => "BA{$i}01",
                'descriptive_title' => "Political Science Subject {$i}",
                'units' => 3,
                'final_grades' => $finalGrade,
                'removal_rating' => 'N/A',
                'remarks' => $remarks,
                'student_id' => $student->id,
            ]);
        }
    }

    private function createEnglishLiteratureGrades($student, $semester)
    {
        for ($i = 1; $i <= 10; $i++) {
            $finalGrade = mt_rand(70, 100); // Randomize final grades between 70 and 100

            // Check if the final grade is 75 or below
            $remarks = ($finalGrade <= 75) ? 'Failed' : 'Passed';

            StudentsGrade::create([
                'term' => $semester,
                'code_no' => "BA{$i}",
                'course_no' => "BA{$i}01",
                'descriptive_title' => "Emglish Literature Subject {$i}",
                'units' => 3,
                'final_grades' => $finalGrade,
                'removal_rating' => 'N/A',
                'remarks' => $remarks,
                'student_id' => $student->id,
            ]);
        }
    }

    private function createSociologyGrades($student, $semester)
    {
        for ($i = 1; $i <= 10; $i++) {
            $finalGrade = mt_rand(70, 100); // Randomize final grades between 70 and 100

            // Check if the final grade is 75 or below
            $remarks = ($finalGrade <= 75) ? 'Failed' : 'Passed';

            StudentsGrade::create([
                'term' => $semester,
                'code_no' => "BA{$i}",
                'course_no' => "BA{$i}01",
                'descriptive_title' => "Sociology Subject {$i}",
                'units' => 3,
                'final_grades' => $finalGrade,
                'removal_rating' => 'N/A',
                'remarks' => $remarks,
                'student_id' => $student->id,
            ]);
        }
    }

    // Sample method for History program
    private function createHistoryGrades($student, $semester)
    {
        for ($i = 1; $i <= 10; $i++) {
            $finalGrade = mt_rand(70, 100); // Randomize final grades between 70 and 100

            // Check if the final grade is 75 or below
            $remarks = ($finalGrade <= 75) ? 'Failed' : 'Passed';
            StudentsGrade::create([
                'term' => $semester,
                'code_no' => "BA{$i}",
                'course_no' => "BA{$i}01",
                'descriptive_title' => "History Subject {$i}",
                'units' => 3,
                'final_grades' => $finalGrade,
                'removal_rating' => 'N/A',
                'remarks' => $remarks,
                'student_id' => $student->id,
            ]);
        }
    }

    // Sample method for Engineering program
    private function createEngineeringGrades($student, $semester)
    {
        for ($i = 1; $i <= 10; $i++) {
            $finalGrade = mt_rand(70, 100); // Randomize final grades between 70 and 100

            // Check if the final grade is 75 or below
            $remarks = ($finalGrade <= 75) ? 'Failed' : 'Passed';
            StudentsGrade::create([
                'term' => $semester,
                'code_no' => "BA{$i}",
                'course_no' => "BA{$i}01",
                'descriptive_title' => "Engineering Subject {$i}",
                'units' => 3,
                'final_grades' => $finalGrade,
                'removal_rating' => 'N/A',
                'remarks' => $remarks,
                'student_id' => $student->id,
            ]);
        }
    }

    // Sample method for Psychology program
    private function createPsychologyGrades($student, $semester)
    {
        for ($i = 1; $i <= 10; $i++) {
            $finalGrade = mt_rand(70, 100); // Randomize final grades between 70 and 100

            // Check if the final grade is 75 or below
            $remarks = ($finalGrade <= 75) ? 'Failed' : 'Passed';
            StudentsGrade::create([
                'term' => $semester,
                'code_no' => "BA{$i}",
                'course_no' => "BA{$i}01",
                'descriptive_title' => "Psychology Subject {$i}",
                'units' => 3,
                'final_grades' => $finalGrade,
                'removal_rating' => 'N/A',
                'remarks' => $remarks,
                'student_id' => $student->id,
            ]);
        }
    }
}
