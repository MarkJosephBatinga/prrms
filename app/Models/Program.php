<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProgramCourse;

class Program extends Model
{
    use HasFactory;

    protected $table = 'programs';

    protected $fillable = [
        'program_name',
        'effective_school_year',
        'dean',
        'program_chair'
    ];


    public function program_courses()
    {
        return $this->hasMany(ProgramCourse::class);
    }
}
