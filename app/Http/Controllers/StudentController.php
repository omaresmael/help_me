<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    public function create()
    {
        $schools = School::all();
        return view('student.create', compact('schools'));
    }

    public function store(StudentRequest $request)
    {

        Student::create($request->all());
        return redirect('students')->with(['message' => 'تم إضافة الطالب بنجاح']);
    }

    public function show(Student $student, Request $request)
    {
        if($request->has('national_number'))
        {
            $student = Student::where('national_number','like',$request->national_number)->first();
            if ($student)
            {
                return view('student.show',compact('student'));
            }
            return back()->with('search_error','لا يوجد طالب بهذا الرقم المدني');
        }


        return view('student.show',compact('student'));
    }

    public function addAbsenceDays()
    {
        $students = Student::all();

        return view('student.absence',compact('students'));
    }

    public function updateAbsenceDays($studentId, Request $request)
    {


        $student = Student::find($studentId);

        $validatedData = $request->validate(['days' => ['required']]);
        $days = $validatedData['days'];
        $period = $student->getCurrentPeriod();
        if(!$period)
            return back()->with('error','ليس هناك فترة مسجله ليتم إضافة الغياب إليها');
        $totalAbsentDays = $student->addAbsenceDays($days);

        $school = $student->school();

        $program = $student->program();
        $program =  $school->programs()->where('program_id', $program->id)->first();

        $programDayPrice = $program->pivot->program_day_price;



        $school->absenceEntitlements($totalAbsentDays, $period, $programDayPrice);


        return view('student.index')->with(['message' => $student->name.'تم إضافة الغياب بنجاح للطالب']);
    }
    /**
     * get edit view for updating student
     * @param \App\models\Student $student
     * @return view
     */
    public function edit(Student $student)
    {

        $schools = School::all();
        return view('student.edit', compact('student', 'schools'));
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
        return redirect('students')->with(['message' => 'تم تعديل الطالب بنجاح']);
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return back()->with('success','تم إزالة الطالب بنجاح');
    }
}
