<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\School;
use App\Models\Student;
use App\Models\StudentLog;
use Illuminate\Http\Request;
use App\Helpers\Disabilities\Disability;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('Student.index', compact('students'));
    }

    public function create()
    {
        $schools = School::all();
        $disabilities = new Disability;
        $disabilities = $disabilities->listOfDisabilities();
        return view('Student.create', compact('schools', 'disabilities'));
    }

    public function store(StudentRequest $request)
    {
        $student = Student::create($request->validated());
        if($period = $student->getCurrentPeriod())
        {
            $student->absence()->sync($period->id,['absence_days' => 0]);
        }
        StudentLog::create([
            'student_id' => $student->id,
            'school_id' => $student->school()->id
        ]);
        return redirect('students')->with(['message' => 'تم إضافة الطالب بنجاح']);
    }

    public function show(Student $student, Request $request)
    {
        if($request->has('national_number'))
        {
            $student = Student::where('national_number','like',$request->national_number)->first();
            if ($student)
            {
                return view('Student.show',compact('student'));
            }
            return back()->with('search_error','لا يوجد طالب بهذا الرقم المدني');
        }


        return view('Student.show',compact('student'));
    }

    public function addAbsenceDays()
    {
        $students = Student::all();

        return view('Student.absence',compact('students'));
    }

    public function updateAbsenceDays( Request $request)
    {


        $student = Student::find($request->student_id);

        $validatedData = $request->validate(['days' => ['required']]);
        $days = $validatedData['days'];
        $period = $student->getCurrentPeriod();
        if(!$period)
            return back()->with('error','ليس هناك فترة مسجله ليتم إضافة الغياب إليها');
        $totalAbsentDays = $student->addAbsenceDays($days);

        $school = $student->school();

        $program = $student->program()[1];
        $program =  $school->programs()->where('program_id', $program->id)->first();

        $programDayPrice = $program->pivot->program_day_price;



        $school->absenceEntitlements($totalAbsentDays, $period, $programDayPrice);


        return back()->with(['message' => $student->name.'تم إضافة الغياب بنجاح للطالب']);
    }
    /**
     * get edit view for updating student
     * @param \App\models\Student $student
     * @return view
     */
    public function edit(Student $student)
    {
        $schools = School::all();
        $disabilities = new Disability;
        $disabilities = $disabilities->listOfDisabilities();
        return view('Student.edit', compact('student', 'schools', 'disabilities'));
    }
    /**
     * updating student
     * @param \App\Http\Requests\UpdateStudentRequest  $request
     * @param \App\models\Student $student
     * @return redirect
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->validated());
        if($student->load('Logs')->orderBy('created_at', 'desc')->first()->school_id !== $student->school()->id){
            StudentLog::create([
                'student_id' => $student->id,
                'school_id' => $student->school()->id
            ]);
        }
        return redirect('students')->with(['message' => 'تم تعديل الطالب بنجاح']);
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return back()->with('success','تم إزالة الطالب بنجاح');
    }
}
