<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProgramCourse;
use App\Models\Student;
use App\Models\Program;
use App\Models\ApprovalLog;

class Program extends Model
{
    use HasFactory;

    protected $table = 'programs';

    protected $fillable = [
        'program_name',
        'effective_school_year',
        'dean',
        'program_chair',
        'listing_status'
    ];


    public function program_courses()
    {
        return $this->hasMany(ProgramCourse::class);
    }

    public function program_student_count($college) 
    {

        if($college == 'college of information technology'){
            $programs = Program::where('program_name', 'Master in Information Technology')->get();
        } else{
            $programs = Program::get();
        }

        $programs = collect($programs)->map(function($program) {

            $preRegisteredCount = 0;
            $endorsedCount = 0;
            $approvedCount = 0;
            $studentCount = 0;
    
            $students = Student::with('approval_log')->where('program', $program->id)->get();
            foreach($students as $student){
                $studentStatus = $student->approval_log->status;
    
                if($studentStatus == 1){
                    $preRegisteredCount += 1;
                } elseif($studentStatus == 2){
                    $endorsedCount += 1;
                } elseif($studentStatus == 3){
                    $approvedCount += 1;
                }

                $studentCount += 1;
            }
    
            $programObject = new \stdClass();
            $programObject->program_name = $program->program_name;
            $programObject->pre_registered = $preRegisteredCount;
            $programObject->endorsed = $endorsedCount;
            $programObject->approved = $approvedCount;
            $programObject->students = $studentCount;
    
            return $programObject;
        });
    
        return $programs;
    }
}
