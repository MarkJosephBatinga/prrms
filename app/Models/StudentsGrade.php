<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
