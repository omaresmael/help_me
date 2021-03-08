<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class School extends Model
{

    /**
    TODO::
     * refactor -> Use getSchoolTotalRowMoney In getSchoolRowMoney
     **/


    protected $fillable = ['name','name_english','phone_number','fax_number','email','address','state'];

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
    //get the row money without periods
    public function getSchoolTotalRowMoney()
    {
        $programs = $this->programs;
        $totalRowMoney = 0;
        foreach($programs as $program)
        {
            $programStudents = Student::where('program_school_id',$program->pivot->id)->get();
            $numberOfStudents = $programStudents->count();
            $totalRowMoney += $program->pivot->program_price * $numberOfStudents;
        }
        return $totalRowMoney;
    }
//get the money before the penalties and absence cost values for one period

    public function getSchoolRowMoney(Period $period)
    {
        $initialValue = 0;
        $programs = $this->programs;

        foreach($programs as $program)
        {

            $programStudents = Student::where('program_school_id',$program->pivot->id)->get();
            $numberOfStudents = $programStudents->count();

            $totalProgramPrice = $program->pivot->program_price * $numberOfStudents;
            $initialValue += $totalProgramPrice * $period->financial_ratio / 100;
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



    public function getSchoolEntitlements($initialValue)
    {

        $deservedValue = 0;

        $periodAbsenceDays = 0;

        $absenceCost = 0; //the amount of money that costs the school due to their student absence

        $programs = $this->programs;
        $periods = $this->periods;

        foreach ($periods as $period)
        {
            foreach ($programs as $program)
            {
                $programStudents = Student::where('program_school_id',$program->pivot->id)->get();

                foreach($programStudents as $student)
                {
                    //this table isn't yet migrated, don't forget to do so!
                    $periodAbsenceDays += $student->periods->pivot->absence_days;
                }

                $absenceCost += $periodAbsenceDays * $program->pivot->day_price;
            }
            // you still need to subtract Penalties cost from the initial value
            $deservedValue = $initialValue - $absenceCost;

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
