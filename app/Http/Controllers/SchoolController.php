<?php

namespace App\Http\Controllers;

use App\Exports\SchoolExport;
use App\Exports\StudentExport;
use App\Http\Requests\SchoolRequest;
use App\Http\Requests\UpdateSchoolRequest;
use App\Helpers\Countries\Country;
use App\Imports\SchoolImport;
use App\Models\Fine;
use App\Models\Period;
use App\Models\Program;
use App\Models\School;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\App;
use DateTime;
use Hamcrest\Type\IsNumeric;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::all();
        return view('School.index', compact('schools'));
    }

    public function create()
    {
        $programs = Program::all();
		$countries = new Country();
		$countries = $countries->listOfCountries();
        return view('School.create', compact('programs','countries'));
    }
	/**
	* get all countries of selected country
	* @param string $country
	* @return array $cities
	*/
	public function getCities($country)
	{
		$countries = new Country();
		$cities = $countries->getCountryCities($country);
		return $cities;
	}
    /**
     * store a new school
     * @param App\Http\Request\SchoolRequest $request
     * @return redirect
     */
    public function store(SchoolRequest $request)
    {
        $school = School::create($request->validated());
        if($request->programs[0] === 'Select' || !is_numeric($request->programs_price[0]) || $request->programs_price[0] === 0)
            return redirect('schools')->with(['message' => 'تم إضافة الهيئه التعليمة بنجاح']);
            $programs = $request->programs;
            $programs_price = $request->programs_price;
            $start_at = $request->start_at;
            $end_at = $request->end_at;


            foreach ($programs as $i => $program) {
                /**
                 * TODO:: You need to refactor that into a seperate function, an mutator, or a in creating model function
                 */
                $datetime1 = new DateTime($end_at[$i]);
                $datetime2 = new DateTime($start_at[$i]);

                $interval = $datetime1->diff($datetime2);
                $days = $interval->format('%a');

                $program_day_price = $programs_price[$i] / $days;

                $school->programs()->attach($program, ['program_price' => $programs_price[$i], 'start_at' => $start_at[$i], 'end_at' => $end_at[$i], 'program_day_price' => $program_day_price]);

            }
        return redirect('schools')->with(['message' => 'تم إضافة الهيئه التعليمة بنجاح']);
    }
    public function show(School $school)
    {
        return view('School.show', compact('school'));
    }
    public function edit(School $school)
    {
        $programsList = Program::all();
        $countries = new Country();
        $countries = $countries->listOfCountries();
        return view('School.edit', compact('programsList', 'school','countries'));
    }

    public function getAssociatedPrograms(School $school)
    {
        $programs = $school->programs;
        $names = [];
        foreach ($programs as $program) {
            $names[$program->pivot->id] = $program->name;
        }
        return $names;
    }

    public function financialReport(School $school)
    {

        $studentsNumber = $school->studentsNumber();
        $rowMoney = $school->getSchoolTotalRowMoney();
        $periods = $school->periods()->whereHas('financialYear',function (Builder $query){
            $query->where('status','=','current');
        })->get();
        dd($periods);
        $totalViolaion = $school->getSchoolTotalViolation();

        $totalDeservedValue = $school->periods()->sum('deserved_value');

        $totalInitialValue = $school->periods()->sum('initial_value');

        $residual = $rowMoney - $totalInitialValue - $totalViolaion;

        $programsNumber = $school->programs()->count();
        return view('Report.financial', compact('school', 'periods', 'programsNumber', 'residual', 'rowMoney', 'totalDeservedValue', 'studentsNumber'));
    }
    /**
     *   get the schools finance reports
     * number of students / number of programs / school row money / school
     */
    public function totalFinanceReport()
    {
        $deservedValue = 0;
        $students = Student::all();
        $schools = School::all();
         $periods = Period::whereHas('financialYear',function (Builder $query){
        $query->where('status','=','current');
        })->get();
        if( count($schools) === 0  || count($schools) === 0 || count($periods) === 0)
        {
            return back()->with(['error'=>'من فضلك قم بإضافة مدارس ودفعات دراسية تعيين الطلاب الي مدارس وبرامج في السنة المالية الحالية']);
        }
        return view('School.Report.schools-finance-new', compact('schools','students','periods'));
    }

    public function studentsReport(School $school)
    {
        $students  = $school->students;

        return view('School.Report.students-report',compact('students','school'));
    }
    public function programsReport(School $school)
    {
        $programs  = $school->programs;
        return view('School.Report.programs-report',compact('programs','school'));
    }
    public function teachersReport(School $school)
    {
        $teachers  = $school->teachers;
        return view('School.Report.teachers-report',compact('teachers','school'));
    }
    public function sittingsReport(School $school)
    {
        $sittings  = $school->sittings;
        return view('School.Report.sittings-report',compact('sittings','school'));
    }

    public function periodsReport(School $school)
    {
        /**
         * TODO:: Add The Real value for Absence days  cost
         */
        $periods = $school->periods()->whereHas('financialYear',function (Builder $query){
            $query->where('status','=','current');
        })->get();

        if (count($periods)== 0){

            return back()->with(['error'=>'لا يوجد دفعات']);
        }

        $fines = [];
        $absenceCost = 0;
        foreach ($periods as $period)
        {
            $fines [$period->id] = Fine::period($period)->sum('amount');
        }
        return view('School.Report.periods-report',compact('periods','school','fines'));
    }



    /**
     * get edit view for updating school
     * @param App\Models\School
     * @return view
     */

    /**
     * updating school
     * @param \App\Http\Requests\UpdateSchoolRequest  $request
     * @param \App\models\School $school
     * @return redirect
     */
    public function update(UpdateSchoolRequest $request, School $school)
    {

        $school->update($request->validated());
        if($request->programs[0] === 'Select' || !is_numeric($request->programs_price[0]))
            return redirect('schools')->with(['message' => 'تم تعديل الهئية التعليميه بنجاح']);

            $oldprogramids = [];
            foreach ($school->programs as $i => $program) {
                if($request->programs[$i] == $program->id) {


                }
                else {
                    array_push($oldprogramids,$program->id);
                    }
                }

           $school->programs()->detach($oldprogramids);
            $programs = $request->programs;
            $programs_price = $request->programs_price;
            $start_at = $request->start_at;
            $end_at = $request->end_at;
            foreach ($programs as $i => $program) {

                $datetime1 = new DateTime($end_at[$i]);
                $datetime2 = new DateTime($start_at[$i]);

                $interval = $datetime1->diff($datetime2);
                $days = $interval->format('%a');

                $program_day_price = $programs_price[$i] / $days;
                if($school->programs->contains($program)){
                    continue;
                };
                $school->programs()->attach($program, ['program_price' => $programs_price[$i], 'start_at' => $start_at[$i], 'end_at' => $end_at[$i], 'program_day_price' => $program_day_price]);
            }
        return redirect('schools')->with(['message' => 'تم تعديل الهئية التعليميه بنجاح']);
    }

    public function destroy(School $school)
    {
        $school->delete();
        return back()->with('success','تم إزالة الهيئة التعليمية  بنجاح');
    }

    public function export()
    {
        return Excel::download(new SchoolExport(), "الهيئات التعليمية ".Carbon::now()->toDateString().'.xlsx');
    }

    public function import()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('schools')->truncate();
        Excel::import(new SchoolImport(),request()->file('file'));
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        return back()->with(['success' => 'تم العملية بنجاح']);
    }
}
