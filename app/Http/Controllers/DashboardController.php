<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // 
    public function index(){

        $users = [
            [
                'name' => 'Darshan',
                'age' => 21,
            ],
            [
                'name' => 'Nidhi',
                'age' => 21,
            ]
        ];
    
        return view('dashboard',
        [
            'users' => $users
        ]);
    }
}
