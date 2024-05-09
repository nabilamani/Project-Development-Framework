<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function registeruser(Request $request)
    {
        user::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);
        return redirect('/login');
    }

    public function loginaction(Request $request)
    {
        // if(Auth::attempt($request)) {
        //     return redirect('layouts/index');
        // } else {
        //    return redirect('/login'); 
        //    return redirect()->route('/login')->with('error', 'username/password salah');
        // }
        if (Auth::Attempt($request->only('email','password'))) {
            return redirect('coba');
        }else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
