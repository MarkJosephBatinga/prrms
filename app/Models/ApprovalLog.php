<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class ApprovalLog extends Model
{
    use HasFactory;

    protected $table = 'approval_log'; // Specify the table name if different from the model name

    protected $fillable = ['student_id', 'status', 'notes', 
                            'last_status', 'approve_notes',
                            'register_notes', 'enroll_notes']; // Specify the columns that can be mass-assigned

    // Define relationships if needed
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
