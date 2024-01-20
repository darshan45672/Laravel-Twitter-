<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIdeaRequest;
use App\Http\Requests\UpdateeIdeaRequest;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeasController extends Controller
{
    //
    public function show(Idea $idea){
        return view('ideas.show', compact('idea'));
    }
    

    public function store(StoreIdeaRequest $request){
        $validated = $request->validated();

        $validated['user_id'] = auth()->id();
        Idea::create($validated);

        return redirect()->route('homepage')->with('sucess','idea created Sucessfully!');
    }

    public function edit(Idea $idea){

        // if (auth()->id() !== $idea->user_id){
        //     abort(404);
        // }
        // $this->authorize('idea.edit',$idea);this is using gates
        $this->authorize('update',$idea);

        $editing = true;
        return view('ideas.show', compact('idea','editing'));

    }

    public function destroy(Idea $idea){
        // if (auth()->id() !== $idea->user_id){
        //     abort(404);
        // }

        // $this->authorize('idea.delete',$idea);
        $this->authorize('delete',$idea);

        $idea->delete();

        return redirect()->route('homepage')->with('sucess','Idea deleted Sucessfully !');
    }

    public function update(UpdateeIdeaRequest $request, Idea $idea){
        // if (auth()->id() !== $idea->user_id){
        //     abort(404);
        // }
        $this->authorize('update',$idea);

        $validated = $request->validated();

        $idea->update($validated);

        return redirect()->route('ideas.show',$idea->id)->with('sucess','Idea updated sucessfully !');
    }
}
