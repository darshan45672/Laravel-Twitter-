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
    
    public function edit(Idea $idea){

        $editing = true;
        return view('ideas.show', compact('idea','editing'));

    }

    public function store(){
        $validated = request()->validate([
            'content' => 'required|min:5|max:300',
        ]);

        Idea::create($validated);

        return redirect()->route('homepage')->with('sucess','idea created Sucessfully!');
    }
    public function destroy(Idea $idea){
        
        $idea->delete();

        return redirect()->route('homepage')->with('sucess','Idea deleted Sucessfully !');
    }

    public function update(Idea $idea){
        $validated = request()->validate([
            'content' => 'required|min:10|max:300',
        ]);

        $idea->update($validated);

        return redirect()->route('ideas.show',$idea->id)->with('sucess','Idea updated sucessfully !');
    }
}
