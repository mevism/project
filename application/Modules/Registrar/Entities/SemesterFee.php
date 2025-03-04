<?php

namespace Modules\Registrar\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Registrar\Entities\VoteHead;
use PhpParser\Node\Expr\Cast;

class SemesterFee extends Model
{
    use HasFactory;

    protected $fillable = ['semester_fee_id', 'course_code', 'vote_id', 'semester', 'attendance_id', 'amount', 'version'];

    public function semVotehead(){
        return $this->belongsTo(VoteHead::class, 'vote_id', 'vote_id');
    }

    public function CourseFee(){
        return $this->belongsTo(Courses::class, 'course_code', 'course_code');
    }

    protected static function newFactory()
    {
        return \Modules\Registrar\Database\factories\SemesterFeeFactory::new();
    }

}
