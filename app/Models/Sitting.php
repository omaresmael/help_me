<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sitting extends Model
{
    protected $fillable = ['name','date','student_id','teacher_id','price'];
    protected $appends = ['working_days'];

    /**
     *
     *
     */

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
