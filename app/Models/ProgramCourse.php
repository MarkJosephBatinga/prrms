<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class ProgramCourse extends Model
{
    use HasFactory;

    protected $table = 'program_courses';

    protected $fillable = [
        'program_id',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
