<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
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
}
