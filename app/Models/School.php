<?php

namespace App\Models;


use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{

    /**
    TODO::
     * refactor -> Use getSchoolTotalRowMoney In getSchoolRowMoney
     **/
    protected $guarded = [];

    public function periods()
    {
        return $this->belongsToMany(Period::class)->withPivot('initial_value','deserved_value');
    }

    public function programs()
    {
        return $this->belongsToMany(Program::class)->withPivot('program_price','program_day_price','start_at','end_at','id');
    }

    public function students()
    {
        return $this->hasManyThrough(Student::class, ProgramSchool::class);
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function sittings()
    {
        return $this->hasManyThrough(Sitting::class, Teacher::class);
    }

    public function fines()
    {
        return $this->hasMany(Fine::class);
    }
    //get the row money without periods
    public function getSchoolTotalRowMoney()
    {
        $programs = $this->programs;
        $sittings = $this->sittings();
        $totalRowMoney = 0;
        foreach($programs as $program)
        {
            $programStudents = Student::where('program_school_id',$program->pivot->id)->get();
            $numberOfStudents = $programStudents->count();
            $totalRowMoney += $program->pivot->program_price * $numberOfStudents;
        }

        $totalRowMoney = $totalRowMoney + $sittings->sum('price');

        return $totalRowMoney;
    }

    /**
     * Get the fines of the school due to the violation that been applied to each period caused by the absence of a student or fine
     */
    public function getSchoolTotalViolation()
    {
        $totalViolation = 0;
        $periods = $this->periods;
        foreach($periods as $period)
        {
            $totalViolation += $period->pivot->initial_value - $period->pivot->deserved_value;
        }
        return $totalViolation;
    }
//get the money before the penalties and absence cost values for one period

    public function getSchoolRowMoney(Period $period)
    {
        $initialValue = 0;
        $programs = $this->programs;
        $sittings = $this->sittings;
        foreach($programs as $program)
        {
            $numberOfStudents = $program->studentsNumber();
            $totalProgramPrice = $program->pivot->program_price * $numberOfStudents;
            $initialValue += $totalProgramPrice * $period->financial_ratio / 100;
        }
        foreach($sittings as $sitting)
        {
            $initialValue += $sitting->price  * $period->financial_ratio / 100;
        }
        return $initialValue;
    }

    public function absenceEntitlements($totalAbsentDays,Period $period,$programDayPrice)
    {
           $initialValue = $this->getSchoolRowMoney($period);
           $absenceCost = $programDayPrice * $totalAbsentDays;
           $deservedValue = $initialValue - $absenceCost;
           $this->periods()->updateExistingPivot($period->id,['deserved_value'=>$deservedValue]);

    }

    public function finesEntitlements(Period $period, $amount)
    {
        $period = $this->periods()->where('periods.id',$period->id)->first();
        $deservedValue = $period->pivot->deserved_value - $amount;
        $this->periods()->updateExistingPivot($period->id,['deserved_value'=>$deservedValue]);
    }



    public function getSchoolEntitlements($initialValue)
    {

        $deservedValue = 0;

        $periodAbsenceDays = 0;

        $absenceCost = 0; //the amount of money that costs the school due to their student absence
        $finesAmount = 0;

        $programs = $this->programs;
        $periods = $this->periods;

        foreach ($periods as $period)
        {
            foreach ($programs as $program)
            {

                $programStudents = Student::where('program_school_id',$program->pivot->id)->get();

                foreach($programStudents as $student)
                {

                    $student->absence->each(function($item) use ($periodAbsenceDays) {
                        $this->periodAbsenceDays +=   $item->pivot->absence_days;
                    });

                }

                $absenceCost += $periodAbsenceDays * $program->pivot->day_price;
            }


            $finesAmount = $this->fines()->sum('amount');

            $deservedValue = $initialValue - $absenceCost - $finesAmount;

            return $deservedValue;
        }

    }
    /*
     * *** these functions are now redundant -> remove them when you uou replace them with students function
     * Student functions
     ** studentsNames
     ** StudentsId
     */
    public function studentsNames()
    {
        $studentsNames = [];
        $programs =$this->programs;
        foreach ($programs as $i => $program)
        {
            array_push($studentsNames, Student::where('program_school_id',$program->pivot->id)->pluck('name')->all());
        }
        return $studentsNames;
    }

    public function studentsId()
    {
        $studentsIds = [];
        $programs =$this->programs;

        foreach ($programs as $i => $program)
        {

            $students = Student::where('program_school_id',$program->pivot->id)->pluck('id');

            foreach ($students as  $student)
            {

                array_push($studentsIds,$student)  ;
            }


        }


        return $studentsIds;
    }


//we need a geniraized form of this
    public function studentsNumber()
    {
        return $this->students()->count();
    }






}
