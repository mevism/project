<?php

namespace Modules\COD\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseSyllabus extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function SyllabusUnit(){
        return $this->belongsTo(Unit::class, 'unit_code', 'unit_code');
    }

    protected static function newFactory()
    {
        return \Modules\COD\Database\factories\CourseSyllabusFactory::new();
    }
}
