<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registrationUser(){

        return view('authUser.registration');
    }

    public function storeUser(Request $request){

        $request->validate([
            'name' =>'required|min:2',
            'email' => 'required|email|unique:users',
            'password'=> 'required|min:6',
            'password_confirmation' => 'same:password'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.page-login')->with('reqister_success', 'Вы успешно зарегистрировались! Войдите в аккаунт!');
    }

    public function loginPage(){
        return view('authUser.login');
    }

    public function loginUser(Request $request){

        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credential)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Email или пароль введен не верный!'
        ])->onlyInput('email');
    }

    public function logout(Request $request){

        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect()->route('app.index');
    }


}
