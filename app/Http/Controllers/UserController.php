<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Ability;
use App\User;

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
}
