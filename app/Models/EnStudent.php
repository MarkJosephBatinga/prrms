<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_type',
        'student_status',
        'name',
        'nationality',
        'address',
        'mobile_number',
        'program',
        'file_record',
        'payment_mode',
    ];

    public function grades()
    {
        return $this->hasMany(StudentsGrade::class);
    }
}
