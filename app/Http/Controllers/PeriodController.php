<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeriodRequest;
use App\Models\Period;
use App\Models\School;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    public function index()
    {
        $periods = Period::all();

        return view('period.index', compact('periods'));
    }

    public function create()
    {

        $schools = School::all();

        return view('period.create', compact('schools'));
    }

    public function store(PeriodRequest $request)
    {
        $period = Period::create($request->all());
        $schoolsIds = $request->schools; //the schools that been assigned to this period
        $schools = School::whereIn('id', $schoolsIds)->get();
        foreach ($schools as $school)
        {
            $initialValue = $school->getSchoolRowMoney($period);
            $studentsId = $school->studentsId();
            $period->absence()->attach($studentsId, ['absence_days' => 0]);
            $school->periods()->attach($period->id, ['initial_value' => $initialValue, 'deserved_value' => $initialValue]);
        }



        return back()->with(['success' => 'تم إضافة الدفعة بنجاح']);
    }
}
