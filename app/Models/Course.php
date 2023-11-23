<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Program;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'course_category',
        'course_code',
        'descriptive_title',
        'units',
        'program_id'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
