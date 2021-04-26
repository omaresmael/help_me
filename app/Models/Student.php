<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'national_number',
        'guardian_name',
        'guardian_national_number',
        'email',
        'ministry_nomination',
        'school_nomination',
        'program_school_id',
        'disability_type',
        'disability_power',
        'attendance_end',
        'attendance_begin',
        'section',
        'report_type'
    ];
    protected $appends = ['working_days'];

    // this represents the relation between student and the his school and program
    public function data()
    {
        return $this->belongsTo(ProgramSchool::class, 'program_school_id');
    }

    public function absence()
    {
        return $this->belongsToMany(Period::class, 'absence')->withPivot('absence_days');
    }

    public function school()
    {

        if($this->data){
            return School::find($this->data->school_id);
        }
        return false;
    }

    public function program()
    { 
        if($this->data) {
            $program = Program::find($this->data->program_id);

            $working_days = $program->working_days;

            $financeData = $program->schools()->where('program_id', $program->id)->first();


            return [$financeData, $program];
        }
        return false;
    }

    public function sittings()
    {
        return $this->hasMany(Sitting::class);
    }



    public function addAbsenceDays($days)
    {

        $period = $this->getCurrentPeriod();

        $absence_days = $this->absenceDays($period);

        $absence_days = $absence_days->pivot->absence_days;

        $period->absence()->updateExistingPivot($this->id, ['absence_days' => $absence_days + $days]);

        return $absence_days + $days;
    }

    public function absenceDays($period)
    {

        return $this->absence()->first();
    }

    public function getCurrentPeriod()
    {

        $period = Period::whereHas('absence', function (Builder $query) {
            $query->where('start_at', '<', Carbon::now()->toDateString())->where('end_at', '>', Carbon::now()->toDateString());
        })->first();
        return $period;
    }

    public function totalAbsenceDays()
    {
        $totalAbsenceDays = $this->absence()->sum('absence_days');
        return $totalAbsenceDays;
    }

    public function getWorkingDaysAttribute()
    {


        $start_at = $this->attendance_begin;
        $end_at = $this->attendance_end;

        $datetime1 = new DateTime($end_at);
        $datetime2 = new DateTime($start_at);

        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');

        return $days;
    }
}
