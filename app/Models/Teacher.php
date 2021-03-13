<?php

namespace App\Models;

use App\Models\School;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['name','school_id'];

    public function School()
    {
        return $this->belongsTo(School::class);
    }
}
