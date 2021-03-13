<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sitting extends Model
{
    protected $fillable = ['name','start_at','end_at','teacher_id','price'];

    /**
     * TODO:: Add Accessor that reformat the datetime into start date and enddate values to store it in database in create page
     * TODO:: Add multiple select to students in create page
     */

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
