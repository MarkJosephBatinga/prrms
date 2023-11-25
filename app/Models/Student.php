<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Program;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

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

    public function user_info()
    {
        return $this->hasOne(User::class, 'student_id', 'id');
    }

    public function program_info()
    {
        return $this->belongsTo(Program::class, 'program');
    }

}
