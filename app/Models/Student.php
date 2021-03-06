<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = ['name','national_number','guardian_name','guardian_national_number','email','ministry_nomination','school_nomination','program_school_id'];
    // this represents the relation between student and the his school and program
    public function data()
    {
        return $this->belongsTo(ProgramSchool::class,'program_school_id');
    }

    public function absence()
    {
        return $this->belongsToMany(Period::class,'absence')->withPivot('absence_days');
    }

    public function school()
    {
        return School::find($this->data->school_id);
    }

    public function program()
    {
        return Program::find($this->data->program_id);
    }


    public function addAbsenceDays($days)
    {

        $period = $this->getCurrentPeriod();

        $absence_days = $this->absenceDays($period);

        $absence_days = $absence_days->pivot->absence_days;

        $period->absence()->updateExistingPivot($this->id,['absence_days'=>$absence_days+$days]);

        return $absence_days+$days;
    }

    public function absenceDays($period)
    {
        return $this->absence()->where('period_id',$period->id)->first();
    }

    public function getCurrentPeriod()
    {

        $period = Period::whereHas('absence', function (Builder $query) {
            $query->where('start_at', '<', Carbon::now()->toDateString())->where('end_at', '>', Carbon::now()->toDateString());
        })->first();
        return $period;
    }


}
