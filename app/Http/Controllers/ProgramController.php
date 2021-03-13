<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgramRequest;
use App\Models\Program;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        return view('program.index', compact('programs'));
    }

    public function create()
    {
        return view('program.create');
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
    public function update(ProgramRequest $request,Program $program)
    {
        $program->update($request->validated());
        return redirect('programs')->with(['message' => 'تم تعديل البرنامج التعليميه بنجاح']);
    }
}
