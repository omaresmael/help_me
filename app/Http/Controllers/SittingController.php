<?php

namespace App\Http\Controllers;

use App\Exports\SittingExport;
use App\Exports\StudentExport;
use App\Http\Requests\SittingRequest;
use App\Imports\SittingImport;
use App\Imports\StudentImport;
use App\Models\Sitting;
use App\Models\Student;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class SittingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sittings =Sitting::with('teacher')->get();
        return view('Sitting.index',compact('sittings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        $teachers = Teacher::all();
        return view('Sitting.create',compact('students','teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SittingRequest $request)
    {

        Sitting::create($request->validated());
        return back()->with(['success' =>'تم إضافة جلسة بنجاح']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sitting  $sitting
     * @return \Illuminate\Http\Response
     */
    public function show(Sitting $sitting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sitting  $sitting
     * @return \Illuminate\Http\Response
     */
    public function edit(Sitting $sitting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sitting  $sitting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sitting $sitting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sitting  $sitting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sitting $sitting)
    {
        $sitting->delete();
        return back()->with('success','تم إزالة الحصة بنجاح');
    }

    public function export()
    {
        return Excel::download(new SittingExport, "الحصص ".Carbon::now()->toDateString().'.xlsx');
    }

    public function import()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('sittings')->truncate();
        Excel::import(new SittingImport(),request()->file('file'));
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        return back()->with(['success' => 'تم العملية بنجاح']);
    }
}
