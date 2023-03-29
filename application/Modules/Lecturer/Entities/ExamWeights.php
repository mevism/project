<?php

namespace Modules\Lecturer\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExamWeights extends Model
{
    use HasFactory;

    protected $fillable = [];

//    public function

    protected static function newFactory()
    {
        return \Modules\Lecturer\Database\factories\ExamWeightsFactory::new();
    }
}
