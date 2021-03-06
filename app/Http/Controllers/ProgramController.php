<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgramRequest;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::all();


        return view('program.index',compact('programs'));
    }

    public function create()
    {

        return view('program.create');
    }

    public function store(programRequest $request)
    {

        Program::create($request->all());
        return back()->with(['message'=>'The program has been added successfully']);
    }
}
