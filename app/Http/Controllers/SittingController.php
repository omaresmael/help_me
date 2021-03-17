<?php

namespace App\Http\Controllers;

use App\Http\Requests\SittingRequest;
use App\Models\Sitting;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

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
        return view('sitting.index',compact('sittings'));
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
        return view('sitting.create',compact('students','teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Sitting::create($request->all());
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
        //
    }
}
