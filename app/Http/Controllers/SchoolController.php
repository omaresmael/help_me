<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolRequest;
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
        return back()->with(['message'=>'تم إضافة المدرسة بنجاح']);
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


}
