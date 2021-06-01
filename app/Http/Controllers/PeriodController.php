<?php

namespace App\Http\Controllers;

use App\Exports\PeriodsExport;
use App\Http\Requests\PeriodRequest;
use App\Imports\PeriodsImport;
use App\Models\FinancialYear;
use App\Models\Period;
use App\Models\School;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

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
        $finantialYears = FinancialYear::where('status', 'current')->select('year', 'id')->get();
        if (count($finantialYears) === 0)
            return redirect('financial_years/create')->with(['error'=>'قم بإنشاء سنة مالية اولا ثم إنشاء الدفعات']);
        return view('Period.create', compact('schools', 'finantialYears'));
    }

    public function store(PeriodRequest $request)
    {
        $data = $request->validated();

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
        $finantialYears = FinancialYear::where('status', 'current')->select('year', 'id')->get();

        return view('Period.edit',compact('period','schools','finantialYears'));
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

    public function export()
    {
        return Excel::download(new PeriodsExport(), "الدفعات ".Carbon::now()->toDateString().'.xlsx');
    }

    public function import()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('periods')->truncate();
        Excel::import(new PeriodsImport(),request()->file('file'));
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        return back()->with(['success' => 'تم العملية بنجاح']);
    }
}
