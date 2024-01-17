<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index(){
        // if(Gate::denies('admin')){
        //     abort(403);
        // }

        // $this -> authorize('admin');
        return view('admin.dashboard');
    }
}
