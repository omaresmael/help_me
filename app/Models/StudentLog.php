<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentLog extends Model
{
    protected $guarded = [];

    public function Student(){
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function School(){
        return $this->belongsTo(School::class);
    }
}
