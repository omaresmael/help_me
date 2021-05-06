<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sitting extends Model
{
    protected $guarded = [];

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
