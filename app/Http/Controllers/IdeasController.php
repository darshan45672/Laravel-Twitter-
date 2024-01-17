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
        $validated = request()->validate([
            'content' => 'required|min:5|max:300',
        ]);

        $validated['user_id'] = auth()->id();
        Idea::create($validated);

        return redirect()->route('homepage')->with('sucess','idea created Sucessfully!');
    }

    public function edit(Idea $idea){

        // if (auth()->id() !== $idea->user_id){
        //     abort(404);
        // }
        $this->authorize('idea.edit',$idea);

        $editing = true;
        return view('ideas.show', compact('idea','editing'));

    }

    public function destroy(Idea $idea){
        // if (auth()->id() !== $idea->user_id){
        //     abort(404);
        // }

        $this->authorize('idea.delete',$idea);

        $idea->delete();

        return redirect()->route('homepage')->with('sucess','Idea deleted Sucessfully !');
    }

    public function update(Idea $idea){
        // if (auth()->id() !== $idea->user_id){
        //     abort(404);
        // }
        $this->authorize('idea.edit',$idea);

        $validated = request()->validate([
            'content' => 'required|min:10|max:300',
        ]);

        $idea->update($validated);

        return redirect()->route('ideas.show',$idea->id)->with('sucess','Idea updated sucessfully !');
    }
}
