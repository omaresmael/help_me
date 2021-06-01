<?php

namespace App\Http\Controllers;

use App\Exports\FinancialYearExport;
use App\Http\Requests\FinancialYearRequest;
use App\Imports\FinancialYearImport;
use App\Models\Budget;
use App\Models\FinancialYear;
use App\Models\School;
use Carbon\Carbon;
use finfo;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class FinancialYearController extends Controller
{
    public function index()
    {
        $financialYears = FinancialYear::all();
        return view('Financial-Year.index',compact('financialYears'));
    }
    public function create()
    {
        return view('Financial-Year.create');
    }
    public function show(FinancialYear $financialYear)
    {
        return $financialYear->load('periods')->only('periods');
    }
    public function store(FinancialYearRequest $request)
    {
        FinancialYear::create($request->validated());
        return back()->with(['success' => 'تم إضافة السنة المالية بنجاح']);
    }

    public function update(FinancialYear $financialYear)
    {

        $budget = New Budget();
        $financialYear->status = 'closed';
        $financialYear->save();
        $schools = School::all();
        foreach ($schools as $school)
        {
            $actualFees = 0;
            $total = 0;
            $budget->school_name = $school->name;
            $budget->financial_year_id = $financialYear->id;
            $budget->school_fees = $school->getSchoolTotalRowMoney();
            foreach($school->students as $student)
            {
                $actualFees = ($student->working_days - $student->totalAbsenceDays()) * $student->program()[0]->pivot->program_day_price;
            }
            $budget->actual_fees = $actualFees;
            foreach ($school->periods as $period)
            {
                foreach($school->students as $student)
                {
                    $total += ($student->working_days -$student->absenceDays($period)->pivot->absence_days) * $student->program()[0]->pivot->program_day_price * $period->financial_ratio / 100;
                }

            }
            $budget->total = $total;
            $budget->remainder = $actualFees - $total;
            $budget->save();
        }

        return back()->with(['success' => 'تم إغلاق السنة المالية بنجاح']);
    }
    public function budget(FinancialYear $financialYear)
    {
        $budgets = $financialYear->budgets;
        return view('Financial-Year.budget',compact('budgets'));
    }

    public function export()
    {
        return Excel::download(new FinancialYearExport, "السنوات المالية ".Carbon::now()->toDateString().'.xlsx');
    }

    public function import()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('financial_years')->truncate();
        Excel::import(new FinancialYearImport,request()->file('file'));
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        return back()->with(['success' => 'تم العملية بنجاح']);
    }
}
