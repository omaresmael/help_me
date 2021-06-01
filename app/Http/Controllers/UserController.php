<?php

namespace App\Http\Controllers;

use App\Exports\StudentExport;
use App\Exports\UserExport;
use App\Http\Requests\UserRequest;
use App\Imports\UserImport;
use App\Models\Ability;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('User.index',compact('users'));
    }

    public function create()
    {
        $abilities = Ability::all();

        return view('User.create',compact('abilities'));
    }

    public function store(UserRequest $request)
    {
        $user = User::create($request->validated());
        if($request->has('abilities'))
            $user->abilities()->attach($request->abilities);
        return back()->with('success','تم إضافة مختص بنجاح');
    }
    public function edit(User $user)
    {
        $abilities =Ability::all();
        return view('user.edit',compact('user','abilities'));
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());
        if($request->has('abilities'))
        {
            $user->abilities()->detach();
            $user->abilities()->attach($request->abilities);
        }

        return back()->with(['success' => 'تم تعديل بيانات المختص بنجاح']);


    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with(['success' => 'تم حذف المختص بنجاح']);
    }

    public function export()
    {
        return Excel::download(new UserExport, "المختصين ".Carbon::now()->toDateString().'.xlsx');
    }

    public function import()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        Excel::import(new UserImport,request()->file('file'));
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        return back()->with(['success' => 'تم العملية بنجاح']);
    }
}
