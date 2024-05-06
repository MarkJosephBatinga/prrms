<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StudentsGrade;

class StudentsGrade extends Model
{
    use HasFactory;

    protected $fillable = [
        'term',
        'code_no',
        'course_no',
        'descriptive_title',
        'units',
        'final_grades',
        'removal_rating',
        'remarks',
        'student_id',
    ];

    public function student()
    {
        return $this->belongsTo(EnStudent::class);
    }

    public function grades_remarks_by_course($college){

        if($college == 'college of information technology'){
            $grades = StudentsGrade::where('term', 'First Semester')->where('code_no', 'like', '%CS%')->get();
        } else{
            $grades = StudentsGrade::where('term', 'First Semester')->get();
        }

        $report = new \stdClass();
        foreach($grades as $grade){

            $passed = 0;
            $failed = 0; 

            $passed += ($grade->remarks == 'Passed') ? 1 : 0;
            $failed += ($grade->remarks == 'Failed') ? 1 : 0;                

            if(!isset($report->{$grade->code_no})) {
                $report->{$grade->code_no} = (object)[
                    'code_no' => $grade->code_no,
                    'course_no' => $grade->course_no,
                    'descriptive_title' => $grade->descriptive_title,
                    'units' => $grade->units,
                    'passed' =>  $passed,
                    'failed' => $failed,
                ];
            } else {
                $report->{$grade->code_no}->passed += $passed;
                $report->{$grade->code_no}->failed += $failed;
            }
        }
        
        return $report;
    }
}
