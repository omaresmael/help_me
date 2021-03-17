<?php

namespace App\Models;

use App\Models\School;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['name','school_id','birth_day','speciality','qualification','national_number','entity_acceptance_date','entity_acceptance_number','nationality','job'];

    public function School()
    {
        return $this->belongsTo(School::class);
    }

    public function sittings()
    {
        return $this->hasMany(Sitting::class);
    }
}
