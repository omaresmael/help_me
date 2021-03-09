<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolRequest;
use App\Http\Requests\UpdateSchoolRequest;
use App\Models\Program;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::all();
        return view('school.index',compact('schools'));
    }

    public function create()
    {
        $programs = Program::all();
        return view('school.create',compact('programs'));
    }

    public function store(SchoolRequest $request)
    {
        $school = School::create($request->all());
        if($request->has('programs') && $request->has('programs_price')){
            $programs = $request->programs;
            $programs_price = $request->programs_price;
            $start_at = $request->start_at;
            $end_at = $request->end_at;
            foreach($programs as $i => $program)
            {
                // you need to figure the logic to calculate the program price day nut for now its static
                $school->programs()->attach($program,['program_price'=>$programs_price[$i],'start_at'=>$start_at[$i],'end_at'=>$end_at[$i],'program_day_price'=>'50']);
            }
        }

//        if($periods = $request->has('periods')){
//            $school->periods()->attach($periods);
//        }
        return back()->with(['message'=>'تم إضافة الهيئه التعليمة بنجاح']);
    }

    public function getAssociatedPrograms(School $school)
    {
        $programs = $school->programs;
        $names = [];
        foreach($programs as $program)
        {
            $names[$program->pivot->id] = $program->name;
        }
        return $names;
    }

    public function financialReport(School $school)
    {
        $studentsNumber = $school->studentsNumber();
        $rowMoney = $school->getSchoolTotalRowMoney();
        $periods = $school->periods;
        $totalFines = 0;
        foreach($periods as $period)
        {
            $totalFines += $period->pivot->initial_value - $period->pivot->deserved_value;
        }

        $totalDeservedValue = $school->periods()->sum('deserved_value');

        $totalInitialValue = $school->periods()->sum('initial_value');

        $residual = $rowMoney - $totalInitialValue - $totalFines;

        $programsNumber = $school->programs()->count();
        return view('report.financial',compact('school','periods','programsNumber','residual','rowMoney','totalDeservedValue','studentsNumber'));

    }

    /**
     * get edit view for updating school
     * @param App\Models\School
     * @return view
     */
    public function edit(School $school)
    {
        $programsList = Program::all();
        return view('school.edit',compact('programsList', 'school'));
    }
    /**
     * updating school
     * @param \App\Http\Requests\UpdateSchoolRequest  $request
     * @param \App\models\School $school
     * @return redirect
     */
    public function update(UpdateSchoolRequest $request, School $school)
    {
        $school->update($request->validated());
        if($request->has('programs') && $request->has('programs_price')){
            $oldprogramids=[];
            foreach($school->programs as $program){
                array_push($oldprogramids, $program->id); 
            }
            $school->programs()->detach($oldprogramids);
            $programs = $request->programs;
            $programs_price = $request->programs_price;
            $start_at = $request->start_at;
            $end_at = $request->end_at;
            foreach($programs as $i => $program)
            {
                // you need to figure the logic to calculate the program price day nut for now its static
                $school->programs()->attach($program,['program_price'=>$programs_price[$i],'start_at'=>$start_at[$i],'end_at'=>$end_at[$i],'program_day_price'=>'50']);
            }
        }
        return redirect('schools')->with(['message'=>'تم تعديل الهئية التعليميه بنجاح']);
    }

}
