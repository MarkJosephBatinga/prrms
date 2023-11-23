<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

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


    public function all_courses()
    {
        return $this->hasMany(Course::class);
    }

}
