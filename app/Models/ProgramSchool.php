<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ProgramSchool extends Model
{

    protected $table = 'program_school';
    public function School()
    {
        return $this->belongsTo(School::class);
    }

}
