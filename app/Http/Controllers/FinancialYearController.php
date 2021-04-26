<?php

namespace App\Http\Controllers;

use App\Http\Requests\FinancialYearRequest;
use App\Models\Budget;
use App\Models\FinancialYear;
use App\Models\School;
use Illuminate\Http\Request;

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
}
