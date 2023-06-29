<?php

namespace Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentContact extends Model
{
    use HasFactory;

    protected $fillable = [];
    public function StudentsContact(){
        return $this->belongsTo(StudentInfo::class, 'student_id', 'student_id');
    }

    protected static function newFactory()
    {
        return \Modules\Student\Database\factories\StudentContactFactory::new();
    }
}
