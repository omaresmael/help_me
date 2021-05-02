<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * return loginform Ui
     * @return view
     */
    public function loginForm()
    {
        return view('Auth.login');
    }
    /**
     * get cerdentials and try to authenticate them if they true then redirect to authenticated route
     * if not it will return to the login page with error message
     * @param  App\Http\Requests\LoginRequest $request
     * @return redirect
     */
    public function loginAction(LoginRequest $request)
    {

        return Auth::attempt($request->validated()) ?
            redirect('/dashboard')->with('success', 'لقد تم تسجيل الدخول بنجاح') :
            redirect('/')->with('error', 'برجاء التاكد من اسم المستخدم وكلمة المرور');
    }
    /**
     * get authenticated user and log him out then return to loginPage with success message.
     * @return redirect
     */
    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', 'لقد تم تسجيل الخروج بنجاح');
    }
}
