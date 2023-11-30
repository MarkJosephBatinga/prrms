<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
