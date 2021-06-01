<?php

namespace App\Http\Controllers;

use App\Exports\StudentExport;
use App\Exports\TeacherExport;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Imports\StudentImport;
use App\Imports\TeacherImport;
use App\Models\School;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::with('school')->get();

        return view('Teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = School::all();
        return view('Teacher.create', compact('schools'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeacherRequest $request)
    {

        $validatedData = $request->validated();

        Teacher::create($validatedData);

        return back()->with(['success' => 'تم إضافة المعلم بنجاح']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $schools = School::all();
        return view('Teacher.edit', compact('teacher', 'schools'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UpdateTeacherRequest
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $teacher->update($request->validated());
        return redirect('teachers')->with(['message' => 'تم تعديل المعلم بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
    public function export()
    {
        return Excel::download(new TeacherExport(), "المعلمين ".Carbon::now()->toDateString().'.xlsx');
    }

    public function import()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('teachers')->truncate();
        Excel::import(new TeacherImport(),request()->file('file'));
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        return back()->with(['success' => 'تم العملية بنجاح']);
    }
}
