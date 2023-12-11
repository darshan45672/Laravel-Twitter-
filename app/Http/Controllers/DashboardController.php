<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        // $idea = new Idea([
        //     'content' => 'Hi Darshan',
        //     'likes' => 100,
        // ]);
        // $idea->save();

        return view("dashboard",[
            'ideas' =>Idea::orderBy('created_at', 'DESC')->get()
        ]);
    }
}
