<?php

namespace App\Models;


use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Program extends Model
{

    protected $fillable = ['name'];
    protected $appends = ['working_days'];

    public function schools()
    {
        return $this->belongsToMany(School::class)->withPivot('program_price','program_day_price','start_at','end_at','id');
    }

    public function studentsNumber()
    {
        $countStudents = 0;
        $schools = $this->schools;
        foreach($schools as $school)
        {
            $countStudents += Student::where('program_school_id',$school->pivot->id)->count();

        }
        return $countStudents;

    }

    public function studentsNumberPerSchool($school)
    {
        $school = $this->schools()->where('schools.id',$school->id)->first();

        $countStudents = Student::where('program_school_id',$school->pivot->id)->count();

        return $countStudents;
    }

    public function getWorkingDaysAttribute()
    {

        $program = $this->schools()->where('program_id',$this->id)->first();
        $start_at = $program->pivot->start_at;
        $end_at = $program->pivot->end_at;

        $datetime1 = new DateTime($end_at);
        $datetime2 = new DateTime($start_at);

        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');

        return $days;
    }
}
