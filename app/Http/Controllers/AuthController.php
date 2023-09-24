<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


class AuthController extends Controller
{

    /**
     * Show Login Form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm (){

        $user = \Auth::user();

        if($user!= null){

        return redirect()->intended('ctrl/dashboard');
        }

        return view('auth.login');
    }

    /**
     * Authenticate User
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(Request $request)
    {

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            // Authentication passed...
            return redirect()->intended('ctrl/dashboard');
        }

        return redirect()->intended('login');
    }

    /**
     * Logout logic
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(){

        Auth::logout();

        return redirect()->intended('login');

    }

}
