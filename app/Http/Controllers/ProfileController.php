<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
     // function
     public function index(){
        return view('profile');
    }
}
