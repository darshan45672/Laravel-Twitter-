<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeasController extends Controller
{
    //
    public function show(Idea $idea){
        return view('ideas.show', compact('idea'));
    }
    public function store(){
        request()->validate([
            'idea' => 'required|min:10|max:300',
        ]);

        $idea = Idea::create([ 'content' =>request()->get('idea',''), ]);

        $idea->save();

        return redirect()->route('homepage')->with('sucess','idea created Sucessfully!');
    }
    public function destroy(Idea $idea){
        
        $idea->delete();

        return redirect()->route('homepage')->with('sucess','Idea deleted Sucessfully !');
    }

}
