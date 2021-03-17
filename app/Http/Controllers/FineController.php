<?php

namespace App\Http\Controllers;

use App\Http\Requests\FineRequest;
use App\Models\Fine;
use App\Models\School;
use Illuminate\Http\Request;

class FineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fines = Fine::all();
        return view('Fine.index',compact('fines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = School::all();
        return view('fine.create', compact('schools'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\FineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FineRequest $request)
    {
        $fine = Fine::create($request->validated());
        $school = School::find($fine->school_id);
        $period = $fine->getCurrentPeriod();
        $school->finesEntitlements($period, $fine->amount);

        return back()->with(['success' => 'تم إضافة الجزاء بنجاح']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fine  $fine
     * @return \Illuminate\Http\Response
     */
    public function show(Fine $fine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fine  $fine
     * @return \Illuminate\Http\Response
     */
    public function edit(Fine $fine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fine  $fine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fine $fine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fine  $fine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fine $fine)
    {
        //
    }
}
