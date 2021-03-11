<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $schools = School::all();
        $students = Student::all();
        $programs = Program::all();
        if(view()->exists($request->path())){
            return view($request->path(),compact('schools','students','programs'));
        }
        return view('pages-404');
    }

    public function root()
    {
        $schools = School::all();
        $students = Student::all();
        $programs = Program::all();

        return view('dashboard',compact('schools','students','programs'));
    }
}
