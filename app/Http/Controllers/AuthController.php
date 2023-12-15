<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function store(){
        
        $validated = request()->validate([
            'name' => 'required|min:3|max:40',
            'email'=>'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed']);
   
        User::create([
            'name'=> $validated['name'],
            'email'=> $validated['email'],
            'password'=> Hash::make($validated['password'])
        ]);

        return redirect()->route('homepage')->with('sucess','Account created sucessfully !');
    }

    public function login(){
        return view('auth.login');
    }

    public function authenticate(){

        $validated = request()->validate([
            'email'=>'required|email',
            'password' => 'required|min:8']);

            if(auth()->attempt($validated)){
                request()->session()->regenerate();

                return redirect()->route('homepage')->with('sucess','Logged in sucessfully !');
            };
        return redirect()->route('login')->withErrors(['email' =>"no user found",]);
    }

    public function logout(){
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('homepage')->with('sucess','Logged out sucessfully !');
    }
}
