<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\StudentCourse;
use App\Models\ApprovalLog;
use App\Models\Program;
use App\Models\Schedule;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'course_category',
        'course_code',
        'descriptive_title',
        'units',
        'listing_status'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function course_student_count($college) 
    {
        if($college == 'college of information technology'){
            $programs = Program::with('program_courses')->where('program_name', 'Master in Information Technology')->get();
        } else {
            $programs = Program::with('program_courses.course')->get();
        }
    
        $courses = new \stdClass();
        foreach($programs as $program){
            $programCourses = $program->program_courses;
            
            foreach($programCourses as $programCourse){
                $course = $programCourse->course;
    
                if(!isset($courses->{$course->id})) {
                    $courses->{$course->id} = (object)[
                        'course' => $course->descriptive_title,
                        'counts' => (object)[
                            'pre_registered' => 0,
                            'endorsed' => 0,
                            'approved' => 0,
                            'registered' => 0,
                            'enrolled' => 0,
                            'students' => 0
                        ]
                    ];
                }
            }
        }
    
        foreach($courses as $index => $courseObj) {
            $studentCourses = StudentCourse::where('course_id', $index)->get();
    
            foreach($studentCourses as $studentCourse){
                
                $approvalLog = ApprovalLog::where('student_id', $studentCourse->student_id)->first();
    
                if($approvalLog) {
                    switch ($approvalLog->status) {
                        case 1:
                            $courseObj->counts->pre_registered += 1;
                            break;
                        case 2:
                            $courseObj->counts->endorsed += 1;
                            break;
                        case 3:
                            $courseObj->counts->approved += 1;
                            break;
                        case 4:
                            $courseObj->counts->registered += 1;
                            break;
                        case 5:
                            $courseObj->counts->enrolled += 1;
                            break;
                    }
                    $courseObj->counts->students += 1;
                }
            }
        }
    
        return $courses;
    }
    
    public function course_student_count_chairman($program) 
    {

        $programs = Program::with('program_courses.course')->where('id', $program)->get();
    
        $courses = new \stdClass();
        foreach($programs as $program){
            $programCourses = $program->program_courses;
            
            foreach($programCourses as $programCourse){
                $course = $programCourse->course;
    
                if(!isset($courses->{$course->id})) {
                    $courses->{$course->id} = (object)[
                        'course' => $course->descriptive_title,
                        'counts' => (object)[
                            'pre_registered' => 0,
                            'endorsed' => 0,
                            'approved' => 0,
                            'registered' => 0,
                            'enrolled' => 0,
                            'students' => 0
                        ]
                    ];
                }
            }
        }
    
        foreach($courses as $index => $courseObj) {
            $studentCourses = StudentCourse::where('course_id', $index)->get();
    
            foreach($studentCourses as $studentCourse){
                
                $approvalLog = ApprovalLog::where('student_id', $studentCourse->student_id)->first();
    
                if($approvalLog) {
                    switch ($approvalLog->status) {
                        case 1:
                            $courseObj->counts->pre_registered += 1;
                            break;
                        case 2:
                            $courseObj->counts->endorsed += 1;
                            break;
                        case 3:
                            $courseObj->counts->approved += 1;
                            break;
                        case 4:
                            $courseObj->counts->registered += 1;
                            break;
                        case 5:
                            $courseObj->counts->enrolled += 1;
                            break;
                    }
                    $courseObj->counts->students += 1;
                }
            }
        }
    
        return $courses;
    }
}
