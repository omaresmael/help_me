<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeriodRequest;
use App\Models\FinancialYear;
use App\Models\Period;
use App\Models\School;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    public function index()
    {
        $periods = Period::whereHas('financialYear',function (Builder $query){
            $query->where('status','=','current');
        })->get();

        return view('Period.index', compact('periods'));
    }

    public function create()
    {

        $schools = School::all();

        return view('Period.create', compact('schools'));
    }

    public function store(PeriodRequest $request)
    {
        $finantialYear = FinancialYear::where('status','current')->first();
        if (!$finantialYear)
            return view('Financial-Year.create')->with(['success'=>'قم بإنشاء سنة مالية اولا ثم إنشئ الدفعات']);

        $data = $request->all();
        $data = array_merge($data,['financial_year_id'=>$finantialYear->id]);

        $period = Period::create($data);
        $schoolsIds = $request->schools; //the schools that been assigned to this period
        $schools = School::whereIn('id', $schoolsIds)->get();
        foreach ($schools as $school)
        {
            $initialValue = $school->getSchoolRowMoney($period);
            $studentsId = $school->studentsId();
            $period->absence()->sync($studentsId, ['absence_days' => 0]);
            $school->periods()->attach($period->id, ['initial_value' => $initialValue, 'deserved_value' => $initialValue]);
        }



        return back()->with(['success' => 'تم إضافة الدفعة بنجاح']);
    }
    public function edit(Period $period)
    {
        $schools = School::all();
        return view('Period.edit',compact('period','schools'));
    }
    public function update(PeriodRequest $request, Period $period)
    {
        $period->update($request->validated());
        $period->schools()->detach();
        $schoolsIds = $request->schools;
        $schools = School::whereIn('id', $schoolsIds)->get();
        foreach ($schools as $school)
        {
            $initialValue = $school->getSchoolRowMoney($period);
            $studentsId = $school->studentsId();
            $period->absence()->attach($studentsId, ['absence_days' => 0]);
            $school->periods()->attach($period->id, ['initial_value' => $initialValue, 'deserved_value' => $initialValue]);
        }



        return back()->with(['success' => 'تم تحديث الدفعة بنجاح']);
    }
}
