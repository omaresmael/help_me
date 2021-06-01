<?php

namespace App\Http\Controllers;

use App\Exports\FinesExport;
use App\Http\Requests\FineRequest;
use App\Imports\FinesImport;
use App\Models\Fine;
use App\Models\School;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

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
        return view('Fine.create', compact('schools'));
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
        if($period)
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
        $schools = School::all();
        return view('Fine.edit', compact('fine', 'schools'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\FineRequest  $request
     * @param  \App\Fine  $fine
     * @return \Illuminate\Http\Response
     */
    public function update(FineRequest $request, Fine $fine)
    {
        $fine->update($request->validated());
        return redirect('fines')->with(['success' => 'تم تعديل الجزاء بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fine  $fine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fine $fine)
    {
        $fine->delete();
        return back()->with(['success' => 'تم حذف الجزاء بنجاح']);
    }

    public function export()
    {
        return Excel::download(new FinesExport(), "الجزاءات ".Carbon::now()->toDateString().'.xlsx');
    }

    public function import()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('fines')->truncate();
        Excel::import(new FinesImport(),request()->file('file'));
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        return back()->with(['success' => 'تم العملية بنجاح']);
    }
}
