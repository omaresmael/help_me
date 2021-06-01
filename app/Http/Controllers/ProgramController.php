<?php

namespace App\Http\Controllers;

use App\Exports\ProgramExport;
use App\Exports\StudentExport;
use App\Http\Requests\ProgramRequest;
use App\Imports\ProgramImport;
use App\Imports\StudentImport;
use App\Models\Program;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        return view('Program.index', compact('programs'));
    }

    public function create()
    {
        return view('Program.create');
    }

    public function store(programRequest $request)
    {
        Program::create($request->validated());
        return back()->with(['success' => 'تم إضافة البرنامج بنجاح']);
    }
    /**
     *  get edit view for updating program
     * @param Program $program
     * @return view
     */
    public function edit(Program $program)
    {
        return view('Program.edit', compact('program'));
    }
    /**
     * updating school
     * @param \App\Http\Requests\ProgramRequest  $request
     * @param \App\models\School $school
     * @return redirect
     */
    public function update(ProgramRequest $request, Program $program)
    {
        $program->update($request->validated());
        return redirect('programs')->with(['message' => 'تم تعديل البرنامج التعليميه بنجاح']);
    }

    public function export()
    {
        return Excel::download(new ProgramExport(), "البرامج ".Carbon::now()->toDateString().'.xlsx');
    }

    public function import()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('programs')->truncate();
        Excel::import(new ProgramImport(),request()->file('file'));
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        return back()->with(['success' => 'تم العملية بنجاح']);
    }
}
