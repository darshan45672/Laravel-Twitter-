<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        return view("auth.register");
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

        return redirect()->route('homepage')->with('success','Account created sucessfully !');
    }
}
