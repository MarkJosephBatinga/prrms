<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Program;
use App\Models\ApprovalLog;
use App\Models\StudentCourse;

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
        'birth_cert',
        'letter_intent',
        'rec_letter',
        'years_stop',
    ];

    public function user_info()
    {
        return $this->hasOne(User::class, 'student_id', 'id');
    }

    public function program_info()
    {
        return $this->belongsTo(Program::class, 'program');
    }

    public function course()
    {
        return $this->hasMany(StudentCourse::class);
    }

    public function approval_log()
    {
        return $this->hasOne(ApprovalLog::class, 'student_id');
    }


}
