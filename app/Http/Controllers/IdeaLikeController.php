<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaLikeController extends Controller
{
    public function like(Idea $idea){
        $liker = auth()->user();

        $liker ->likes()->attach($idea->id);
        return redirect()->route('homepage')->with('sucess','Liked sucessfully');
    }
    public function unlike(Idea $idea){
        $liker = auth()->user();

        $liker ->likes()->detach($idea->id);
        return redirect()->route('homepage')->with('sucess','Unliked sucessfully');
    }
}
