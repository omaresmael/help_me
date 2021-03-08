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
        return view('student.index',compact('students'));
    }

    public function create()
    {
        $schools = School::all();
        return view('student.create',compact('schools'));
    }

    public function store(StudentRequest $request)
    {
        Student::create($request->all());
        return back()->with(['message'=>'تم إضافة الطالب بنجاح']);
    }

    public function updateAbsenceDays($studentId,Request $request)
    {

        $student = Student::find($studentId);

        $validatedData = $request->validate(['days' => ['required']]);
        $days = $validatedData['days'];

        $totalAbsentDays = $student->addAbsenceDays($days);

        $school = $student->school();
        $period = $student->getCurrentPeriod();
        $program = $student->program();
        $program =  $school->programs()->where('program_id',$program->id)->first();

        $programDayPrice = $program->pivot->program_day_price;



        $school->absenceEntitlements($totalAbsentDays,$period,$programDayPrice);


        return view('student.index')->with(['message'=>'The student: '.$student->name.' Absence dauys has been updated successfully']);
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
     * get edit view for updating student
     * @param \App\Http\Requests  $request
     * @param \App\models\Student $student
     * @return redirect
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->validated());
        return redirect('students')->with(['message'=>'تم تعديل الطالب بنجاح']);
    }
    
}
